<?php namespace App\Controller\WebGuitarPro;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vankosoft\ApplicationBundle\Controller\AbstractCrudController;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

use App\Form\TablatureForm;
use App\Entity\Tablature;

class TablatureController extends AbstractCrudController
{
    
    public function showAction( Request $request ): Response
    {
        $er             = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );

        return $this->render( 'Pages/Tablatures/show.html.twig', [
            'tabForm'   => $this->_tabForm( new Tablature() )->createView(),
            'item'      => $oTablature,
            'error'     => false,
        ]);
    }
    
    protected function customData( Request $request, $entity = NULL ): array
    {
        return [
            'tabForm'   => $this->_tabForm( new Tablature() )->createView(),
        ];
    }
    
    protected function prepareEntity( &$entity, &$form, Request $request )
    {
        $entity->setUser( $this->getUser() );
        
        $tabFile    = $form['tablature']->getData();
        if ( $tabFile ) {
            $this->createTablature( $entity, $tabFile );
        }
    }
    
    protected function _tabForm( $entity )
    {
        return $this->createForm( TablatureForm::class, $entity );
    }
    
    private function createTablature( Tablature &$tablature, File $file ): void
    {
        $tablatureFile  = $tablature->getTablatureFile() ?: $this->get( 'vs_wgp.factory.tablature_file' )->createNew();
        $tablatureFile->setOriginalName( $file->getClientOriginalName() );
        $tablatureFile->setTablature( $tablature );
        
        $uploadedFile   = new UploadedFile( $file->getRealPath(), $file->getBasename() );
        $tablatureFile->setFile( $uploadedFile );
        $this->get( 'vs_wgp.tablature_uploader' )->upload( $tablatureFile );
        $tablatureFile->setFile( null ); // reset File Because: Serialization of 'Symfony\Component\HttpFoundation\File\UploadedFile' is not allowed
        
        if ( ! $tablature->getTablatureFile() ) {
            $tablature->setTablatureFile( $tablatureFile );
        }
    }
}
