<?php namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index( Request $request ): Response
    {   
        return $this->render( 'pages/tablature-player.html.twig', [
            'tablature' => ''
        ]);
    }
    
    public function login( Request $request )
    {
        $response = \FOS\UserBundle\Controller\SecurityController::loginAction( $request );
        
        var_dump( $response ); die;
    }
}
