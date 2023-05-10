<?php namespace App\Controller\AdminPanel;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

class DefaultController extends AbstractController
{
    public function index( Request $request ) : Response
    {
        $redirectUrl    = $this->generateUrl( 'vs_cms_pages_index' );
        
        return new RedirectResponse( $redirectUrl, 307 );
    }
    
    public function setLanguage( Request $request ): Response
    {
        $lang   = $request->attributes->get( 'lang' );
        $request->getSession()->set( '_locale', $lang );
        
        return $this->redirect( $request->headers->get( 'referer' ) );
    }
    
    public function setLocale( Request $request ): Response
    {
        $locale   = $request->attributes->get( 'locale' );
        $request->getSession()->set( '_locale', $locale );
        
        return $this->redirect( $request->headers->get( 'referer' ) );
    }
}
