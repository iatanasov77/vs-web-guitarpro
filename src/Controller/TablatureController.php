<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use App\Entity\Tablature;

class TablatureController extends BaseController
{
    public function new( Request $request )
    {
        $entity = new Tablature();
        $form   = $this->_tabForm( $entity );
        
        $form->handleRequest( $request );
        
        if ( $form->isSubmitted() ) {//  && $form->isValid()
            
            $file           = $form->get( 'tablature' )->getData();
            // Gess extension for guitar pro files is bin
            //$file->guessExtension()
            
            $newFilename    = $this->_newFileName(  $file->getClientOriginalName() );
            
            // Move the file to the directory where brochures are stored
            try {
                $file->move(
                    $this->getParameter( 'tablatures_directory' ),
                    $newFilename
                );
            } catch ( FileException $e ) {
                // ... handle exception if something happens during file upload
            }
            
            // Populate entity
            $entity->setTablature( $newFilename );
            
            // Save entity
            $em = $this->getDoctrine()->getManager();
            $em->persist( $entity );
            $em->flush();
            
            //return $this->redirect( $form->get( '_currentUrl' )->getData() );
            return $this->redirect( $this->generateUrl( 'tablature_player', ['id' => $entity->getId()] ) );
        }
        
        // @TODO throw exception or redirect to home with error message
    }
    
    public function index( Request $request )
    {
        $er = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        
        return $this->render( 'pages/tablature-index.html.twig', [
            'tabForm'       => $this->_tabForm( new Tablature() )->createView(),
            'tabs'       => $er->findAll()
        ]);
    }
    
    public function show( Request $request )
    {
        $er             = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );
        
        return $this->render( 'pages/tablature-player.html.twig', [
            'tabForm'   => $this->_tabForm( new Tablature() )->createView(),
            'item'      => $oTablature
        ]);
    }
    
    /**
     * Read a tablature file from storage dir
     * 
     * examples: https://ourcodeworld.com/articles/read/329/how-to-send-a-file-as-response-from-a-controller-in-symfony-3
     */
    public function read( Request $request )
    {
        $er             = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );
        
        // open the file in a binary mode
        $fileTablature  = $this->getParameter( 'tablatures_directory' ) . '/' . $oTablature->getTablature();
        
        return new BinaryFileResponse( $fileTablature, 200, ["Content-Type" => "audio/x-guitar-pro"] );
    }
    
    protected function _newFileName( $originalFileName )
    {
        $originalFilename   = pathinfo( $originalFileName, PATHINFO_FILENAME );
        $extension          = pathinfo( $originalFileName, PATHINFO_EXTENSION );
        
        // this is needed to safely include the file name as part of the URL
        $safeFilename       = transliterator_transliterate( 'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename );
        
        return $safeFilename . '-' . uniqid() . '.' . $extension;
    }
}
