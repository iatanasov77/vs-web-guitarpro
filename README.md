# VankoSoft Application

Create Project
---------------

```bash
$ wget http://getcomposer.org/composer.phar
$ php composer.phar create-project vankosoft/application-project VankosoftApplication
$ cd VankosoftApplication
```
Edit .env file to setup your Aplication Database Name and your host url If You Want.


Installation ( Setup Project )
-------------------------------
```
$ php bin/console vankosoft:install
$ yarn install
$ yarn run dev
```

Clear Installation Example
---------------------------
```
$ php bin/console vankosoft:clear-install "Vankosoft Application"
```

Add New Application in Project
-------------------------------
```
$ php bin/console vankosoft:application:create --locale en_US
```

