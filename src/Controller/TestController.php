<?php namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController
{
    public function player( Request $request ): Response
    {   
        return $this->render( 'pages/tablature-player.html.twig', [
            'tablature' => ''
        ]);
    }
}
