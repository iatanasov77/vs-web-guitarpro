<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Twig\Environment;

use Vankosoft\ApplicationBundle\Component\Context\ApplicationContextInterface;

class AuthController extends AbstractController
{
    use GlobalFormsTrait;
    
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
                $this->isGranted( 'ROLE_APPLICATION_ADMIN', $this->getUser() ) ||
                $this->isGranted( 'ROLE_WEB_GUITAR_PRO_ADMIN', $this->getUser() )
            )
        ) {
            return $this->redirectToRoute( $this->getParameter( 'vs_users.default_redirect' ) );
        }
        
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        //var_dump($error); die;
        
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        $tplVars = [
            'locales'                       => $this->getDoctrine()->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'last_username'                 => $lastUsername,
            'error'                         => $error,
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'paidTablatureStoreServices'    => $this->getDoctrine()->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
        ];
        
        return new Response( $this->templatingEngine->render( $this->getTemplate(), $tplVars ) );
    }
    
    public function logout()
    {
        // controller can be blank: it will never be executed!
        throw new \Exception( 'Don\'t forget to activate logout in security.yaml' );
    }
    
    protected function getTemplate(): string
    {
        $template   = 'web-guitar-pro/Pages/login.html.twig';
        
        $appSettings    = $this->applicationContext->getApplication()->getSettings();
        if ( ! $appSettings->isEmpty() && $appSettings[0]->getTheme() ) {
            $template   = 'Pages/login.html.twig';
        }
        
        return $template;
    }
}

