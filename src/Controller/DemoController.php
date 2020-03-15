<?php namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DemoController extends AbstractController
{
    // https://docs.alphatab.net/master/assets/files/player.html
    public function playerWorking( Request $request ): Response
    {
        $er             = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );
        
        return $this->render( 'demo_pages/tablature-player.html.twig', [
            'item'      => $oTablature
        ]);
    }
    
    public function playerLatest( Request $request ): Response
    {
        $er             = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );
        
        return $this->render( 'demo_pages/tablature-player-latest.html.twig', [
            'item'      => $oTablature
        ]);
    }
    
    public function playerEncore( Request $request ): Response
    {
        $er             = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );
        
        return $this->render( 'demo_pages/tablature-player-encore.html.twig', [
            'item'      => $oTablature
        ]);
    }
}
