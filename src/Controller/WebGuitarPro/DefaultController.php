<?php namespace App\Controller\WebGuitarPro;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

use Vankosoft\ApplicationBundle\Component\Context\ApplicationContextInterface;

use App\Entity\Tablature;
use App\Form\TablatureForm;

class DefaultController extends Controller
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
    
    public function index( Request $request ): Response
    {//var_dump( $this->getParameter( 'vs_users.registration_form' ) ); die;
        $er = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        
        $params = [
            'tabForm'   => $this->getTabForm()->createView(),
            'tabs'      => $er->findAll()
        ];
        return new Response( $this->templatingEngine->render( $this->getTemplate(), $params ) );
    }
    
    protected function getTemplate(): string
    {
        $template   = 'web-guitar-pro/Pages/Dashboard/index.html.twig';
        
        $appSettings    = $this->applicationContext->getApplication()->getSettings();
        if ( ! $appSettings->isEmpty() && $appSettings[0]->getTheme() ) {
            $template   = 'Pages/Dashboard/index.html.twig';
        }
        
        return $template;
    }
}
