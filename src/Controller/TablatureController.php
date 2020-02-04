<?php namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class TablatureController extends BaseController
{
    public function new( Request $request )
    {
        $this->form->handleRequest( $request );
        
        if ( $this->form->isSubmitted() ) {//  && $form->isValid()
            
            $file = $this->form->get( 'tablature' )->getData();
            
            $originalFilename = pathinfo( $file->getClientOriginalName(), PATHINFO_FILENAME );
            // this is needed to safely include the file name as part of the URL
            $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();
            
            // Move the file to the directory where brochures are stored
            try {
                $file->move(
                    $this->getParameter( 'tablatures_directory' ),
                    $newFilename
                );
            } catch ( FileException $e ) {
                // ... handle exception if something happens during file upload
            }
            
            $entity = $this->form->getData();
            // updates the 'brochureFilename' property to store the PDF file name
            // instead of its contents
            $entity->setTablature($newFilename);

            
            // ... persist the $product variable or any other work
            
            return $this->redirect($this->generateUrl('app_product_list'));
        }
        
        return $this->render('product/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
