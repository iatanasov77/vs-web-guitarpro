<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class FavoritesController extends AbstractController
{
    public function addFavorite( $id, Request $request ): Response
    {
        $em             = $this->getDoctrine()->getManager();
        $er             = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );
        $oUser          = $this->getUser();
        
        $oUser->addFavorite( $oTablature );
        $em->persist( $oUser );
        $em->flush();
        
        return new JsonResponse( 'Success' );
    }
}
