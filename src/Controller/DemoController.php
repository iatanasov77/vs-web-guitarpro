<?php namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoController extends AbstractController
{
    // https://docs.alphatab.net/master/assets/files/player.html
    public function player( Request $request ): Response
    {   
        return $this->render( 'demo_pages/tablature-player.html.twig', [
            'tablature' => ''
        ]);
    }
}
