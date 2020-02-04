<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Tablature;

class DefaultController extends BaseController
{
    public function index( Request $request ): Response
    {   
        return $this->render( 'pages/tablature-player.html.twig', [
            'tabForm'   => $this->_tabForm( new Tablature() )->createView(),
            'tablature' => ''
        ]);
    }
}
