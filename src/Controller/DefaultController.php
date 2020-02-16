<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Entity\Tablature;

class DefaultController extends BaseController
{
    public function index( Request $request ): Response
    {   
        $er = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        //var_dump($this->getUser()->hasRole('ROLE_DEMO_USER')); die;
        //var_dump($this->getUser()->getTablatures()->count()); die;
        
        return $this->render( 'pages/tablature-index.html.twig', [
            'tabForm'   => $this->_tabForm( new Tablature() )->createView(),
            'tabs'      => $er->findAll()
        ]);
    }
}
