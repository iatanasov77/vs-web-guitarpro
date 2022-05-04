<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

use Vankosoft\ApplicationBundle\Component\Context\ApplicationContextInterface;

use App\Entity\Tablature;
use App\Form\TablatureForm;

class DefaultController extends AbstractController
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
    {
        $er = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        $tabForm    = $this->createForm( TablatureForm::class, new Tablature() );
        
        $params = [
            'tabForm'   => $tabForm->createView(),
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
