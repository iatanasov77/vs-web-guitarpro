<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

use App\Entity\Tablature;

class PlayerController extends BaseController
{
    public function player( Request $request, AuthenticationUtils $authenticationUtils ): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();
        
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();
        
        return $this->render( 'pages/tablature-player.html.twig', [
            'tabForm'       => $this->_tabForm( new Tablature() )->createView(),
            'tablature'     => '',
            'last_username' => $lastUsername,
            'error'         => $error,
        ]);
    }
}
