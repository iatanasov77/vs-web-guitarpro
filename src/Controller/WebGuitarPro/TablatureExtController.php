<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class TablatureExtController extends AbstractController
{
    /**
     * Read a tablature file from storage dir
     *
     * examples: https://ourcodeworld.com/articles/read/329/how-to-send-a-file-as-response-from-a-controller-in-symfony-3
     */
    public function read( $id, Request $request ): Response
    {
        $er             = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );
        
        // open the file in a binary mode
        $fileTablature  = $this->getParameter( 'vs_wgp.tablatures_directory' ) . '/' . $oTablature->getTablatureFile()->getPath();
        
        return new BinaryFileResponse( $fileTablature, 200, ["Content-Type" => "audio/x-guitar-pro"] );
    }
}
