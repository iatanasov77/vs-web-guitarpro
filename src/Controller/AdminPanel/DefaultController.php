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
}
