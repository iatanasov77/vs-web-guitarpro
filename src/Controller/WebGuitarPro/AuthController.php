<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

use Vankosoft\ApplicationBundle\Component\Context\ApplicationContextInterface;

class AuthController extends AbstractController
{
    /** @var ApplicationContextInterface */
    private $applicationContext;
    
    /** @var Environment */
    private $templatingEngine;
    
    public function __construct(
        ApplicationContextInterface $applicationContext,
        Environment $templatingEngine
    ) {
            $this->applicationContext   = $applicationContext;
            $this->templatingEngine     = $templatingEngine;
    }
    
    public function login( AuthenticationUtils $authenticationUtils ): Response
    {
        if ( 
            $this->getUser() && 
            (
                $this->getUser()->getApplications()->contains( $this->applicationContext->getApplication() ) ||
                $this->isGranted( 'ROLE_APPLICATION_ADMIN', $this->getUser() )
            )
        ) {
            return $this->redirectToRoute( 'app_home' );
        }
        
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        //var_dump($error); die;
        
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        $tplVars = array(
            'last_username' => $lastUsername,
            'error'         => $error,
        );
        
        return new Response( $this->templatingEngine->render( $this->getTemplate(), $tplVars ) );
    }
    
    public function logout()
    {
        // controller can be blank: it will never be executed!
        throw new \Exception( 'Don\'t forget to activate logout in security.yaml' );
    }
    
    protected function getTemplate(): string
    {
        $template   = 'web-guitar-pro/pages/login.html.twig';
        
        $appSettings    = $this->applicationContext->getApplication()->getSettings();
        if ( ! $appSettings->isEmpty() && $appSettings[0]->getTheme() ) {
            $template   = 'pages/login.html.twig';
        }
        
        return $template;
    }
}

