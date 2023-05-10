<?php namespace App\Controller\Application;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function openAdminPanel( Request $request ): Response
    {
        $host   = $this->getParameter( 'vankosoft_host' ); // Get from Parameters
        return $this->redirect( 'http://http://admin.' . $host . '/' );
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
