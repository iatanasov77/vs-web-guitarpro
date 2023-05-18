<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoPagesController extends AbstractController
{
    public function alphatab( Request $request ): Response
    {
        $params = [
            
        ];
        
        return $this->render( 'DemoPages/alphatab.html.twig', $params );
    }
}