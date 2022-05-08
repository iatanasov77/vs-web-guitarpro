@Library( 'VankosoftGroovyLib' ) _

node ( label: 'php-host' ) {
    String[] environments   = ["production", "staging"]
    def BUILD_ENVIRONMENT
    def BRANCH_NAME
    def DB_BACKUP
    def REMOTE_DIR
    
    final GIT_REPO_URL      = 'https://github.com/iatanasov77/vs-web-guitarpro.git'
    final APP_FTP_URL       = 'ftp://164.138.221.242/web/project/production/'
    final PHP_BIN           = '/usr/bin/php74'
    
    def GIT_REPO_WITH_CRED;
    def APP_MYSQL_USER;
    def APP_MYSQL_PASSWORD;
    def APP_MYSQL_DATABASE;
    
    def CONFIG_TEMPLATE;
    def APP_FTP_USER;
    def APP_FTP_PASSWORD;
    def APP_DATABASE_URL;
    
    stage( 'Configure Environement' ) {
    
        // Bind Git Credentials
        withCredentials([usernamePassword(credentialsId: 'github-iatanasov77', usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]) {
            GIT_REPO_WITH_CRED = "https://$USERNAME:$PASSWORD@github.com/iatanasov77/vs-web-guitarpro.git"
            
        }

        BUILD_ENVIRONMENT   = input message: 'Select Environment', ok: 'Proceed!',
                                    parameters: [choice(name: 'Select Environment', choices: "${environments.join('\n')}", description: 'What environment to build?')]
        
        switch( BUILD_ENVIRONMENT ) {
            case 'production':
                REMOTE_DIR  = '/opt/VankosoftProjects/WebGuitarPro/production'
                DB_BACKUP   = false
                
                def tags    = vankosoftJob.getGitTags( GIT_REPO_WITH_CRED )
                
                BRANCH_NAME = input message: 'Select Tag', ok: 'Proceed!',
                                    parameters: [choice(name: 'Select a Tag', choices: "${tags.join('\n')}", description: 'What tag to deploy?')]
                                
                break;
                
            default:
                REMOTE_DIR      = '/opt/VankosoftProjects/WebGuitarPro/staging'
                DB_BACKUP       = false
                
                def branches    = vankosoftJob.getGitBranches( GIT_REPO_WITH_CRED )
                
                BRANCH_NAME     = input message: 'Select Branch', ok: 'Proceed!',
                                        parameters: [choice(name: 'Select a Branch', choices: "${branches.join('\n')}", description: 'What branch to deploy?')]
        }
        
        // Bind MySql Credentials
        withCredentials([usernamePassword(credentialsId: 'vankosoft-mysql', usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]) {            
            APP_MYSQL_USER      = "$USERNAME"
            APP_MYSQL_PASSWORD  = "$PASSWORD"
            APP_MYSQL_DATABASE  = "WebGuitarPro_$BUILD_ENVIRONMENT"
    
            APP_DATABASE_URL="mysql://$APP_MYSQL_USER:$APP_MYSQL_PASSWORD@127.0.0.1:3306/$APP_MYSQL_DATABASE"
        }
        
        // Bind FTP Credentials
        withCredentials([usernamePassword(credentialsId: 'guitarpro-ftp', usernameVariable: 'USERNAME', passwordVariable: 'PASSWORD')]) {
            //Using in Template Rendering
            APP_FTP_USER        = "$USERNAME"
            APP_FTP_PASSWORD    = "$PASSWORD"
        }
    }
    
    stage( 'Source Checkout' ) {
        if ( BUILD_ENVIRONMENT == 'production' ) {
            checkout([$class: 'GitSCM', 
                branches: [[name: "refs/tags/${BRANCH_NAME}"]], 
                userRemoteConfigs: [[
                    credentialsId: 'gitlab-iatanasov77', 
                    refspec: '+refs/tags/*:refs/remotes/origin/tags/*', 
                    url: "${GIT_REPO_URL}"]]
            ])
        } else {
            git(
                url: "${GIT_REPO_URL}",
                credentialsId: 'gitlab-iatanasov77',
                branch: "${BRANCH_NAME}"
            )
        }
    }
    
    stage( 'Build Application' ) {
        sh """
            export COMPOSER_HOME='/home/vagrant/.composer';
            /usr/local/bin/phing install-${BUILD_ENVIRONMENT} -verbose -debug
        """
        
        CONFIG_TEMPLATE = readFile( "ftp_deploy.ini.${BUILD_ENVIRONMENT}" )
        writeFile file: 'ftp_deploy.ini',
                text: vankosoftJob.renderTemplate( CONFIG_TEMPLATE, ['url': APP_FTP_URL, 'user': APP_FTP_USER, 'password': APP_FTP_PASSWORD] )
                
        switch( BUILD_ENVIRONMENT ) {
            case 'staging':
                APP_HOST    = 'guitarpro-staging.vankosoft.org'
                break;
            default:
                APP_HOST    = 'guitarpro.vankosoft.org'
        }
        CONFIG_TEMPLATE = readFile( ".env.${BUILD_ENVIRONMENT}" )
        writeFile file: '.env',
                text: vankosoftJob.renderTemplate( CONFIG_TEMPLATE, ['database_url': APP_DATABASE_URL, 'app_host': APP_HOST] )
    }
    
    stage( 'Before Deploy (Create Backup on Hosting, Set Maintenance Mode etc.)' ) {
        if ( BUILD_ENVIRONMENT == 'production' ) {
            if ( DB_BACKUP ) {
                def now = new Date()
                
                script {
                    sshagent(credentials : ['vps-mini-ssh-root']) {
                        sh """
                            ssh -t -t -l root 164.138.221.242 -o StrictHostKeyChecking=no -p 1022  << ENDSSH
                                cd ${REMOTE_DIR}
                                yes | cp -dRf ${REMOTE_DIR} ${REMOTE_DIR}_BACKUP
                                mysqldump -pg2Sx4,+WXwdQ ${DATABASE_PRODUCTION} > ${REMOTE_DIR}/../${DATABASE_PRODUCTION}_${now}.sql
                                #${PHP_BIN} -d memory_limit=-1 bin/console vankosoft:maintenance --set-maintenance
                                
                                returnCode=\$?   # Capture return code
                                exit \$returnCode
ENDSSH
                        """
                    }
                }
            }
        } else {
            echo "For environment 'staging' not needed nothing!"
        }
    }
    
    stage( 'Ftp Deploy' ) {
        sh """
            /usr/bin/php /usr/local/bin/ftpdeploy 'ftp_deploy.ini'
            
            returnCode=\$?   # Capture return code
            exit \$returnCode
        """
    }
    
    stage( 'After Deploy (Run migrations, etc.)' ) {
        if ( BUILD_ENVIRONMENT == 'production' ) {
            script {
                sshagent(credentials : ['vps-mini-ssh-root']) {
                    sh """
                        ssh -t -t -l root 164.138.221.242 -o StrictHostKeyChecking=no -p 1022  << ENDSSH
                            cd ${REMOTE_DIR}
                            ${PHP_BIN} -d memory_limit=-1 bin/console --no-interaction doctrine:migrations:migrate
                            migrationCode=\$?   # Capture migration return code
                            
                            ${PHP_BIN} -d memory_limit=-1 bin/console cache:clear
                            ${PHP_BIN} -d memory_limit=-1 bin/web-guitar-pro cache:clear
                            
                            #${PHP_BIN} -d memory_limit=-1 bin/console vankosoft:maintenance --unset-maintenance
                            
                            #SETUP APPLICATION PERMISSIONS
                            chmod -R 0777 ${REMOTE_DIR}
                            
                            exit \$migrationCode
ENDSSH
                    """
                }
            }
        } else {
            script {
                sshagent(credentials : ['vps-mini-ssh-root']) {
                    sh """
                        ssh -t -t -l root 164.138.221.242 -o StrictHostKeyChecking=no -p 1022  << ENDSSH
                            cd ${REMOTE_DIR}
                            ${PHP_BIN} -d memory_limit=-1 bin/console --no-interaction doctrine:migrations:migrate
                            migrationCode=\$?   # Capture migration return code
                            
                            ${PHP_BIN} -d memory_limit=-1 bin/console cache:clear
                            ${PHP_BIN} -d memory_limit=-1 bin/web-guitar-pro cache:clear
                            
                            #SETUP APPLICATION PERMISSIONS
                            chmod -R 0777 ${REMOTE_DIR}
                            
                            exit \$migrationCode
ENDSSH
                    """
                }
            }
        }
    }

}