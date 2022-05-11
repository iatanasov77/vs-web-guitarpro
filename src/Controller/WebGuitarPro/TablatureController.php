<?php namespace App\Controller\WebGuitarPro;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Vankosoft\ApplicationBundle\Controller\AbstractCrudController;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Doctrine\Common\Collections\ArrayCollection;

use App\Entity\Tablature;

class TablatureController extends AbstractCrudController
{
    use GlobalFormsTrait;
    
    public function showAction( $id, Request $request ): Response
    {
        $er             = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        if ( is_numeric( $id ) ) {
            $oTablature     = $er->find( $id );
        } else {
            $oTablature     = $er->findOneBy( ['slug' => $id] );
        }

        return $this->render( 'Pages/Tablatures/show.html.twig', [
            'tabForm'                   => $this->getTabForm()->createView(),
            'tabCategoryForm'           => $this->getTabCategoryForm()->createView(),
            'item'                      => $oTablature,
            'error'                     => false,
            'tabCategoriesTaxonomyId'   => $this->getTabCategoriesTaxonomy()->getId(),
        ]);
    }
    
    protected function customData( Request $request, $entity = NULL ): array
    {
        return [
            'tabForm'                   => $this->getTabForm()->createView(),
            'tabCategoryForm'           => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'   => $this->getTabCategoriesTaxonomy()->getId(),
            'userCategories'            => $this->get( 'vs_wgp.repository.tablature_category' )->findBy( ['user' => $this->getUser()] ),
        ];
    }
    
    protected function prepareEntity( &$entity, &$form, Request $request )
    {
        $this->easyuiPost( $entity, $request->request->get( 'tablature_form' ) );
        
        $entity->setUser( $this->getUser() );
        
        $tabFile    = $form['tablature']->getData();
        if ( $tabFile ) {
            $this->createTablature( $entity, $tabFile );
        }
    }
    
    private function easyuiPost( Tablature &$entity, $formPost )
    {
        $categories = new ArrayCollection();
        $repo       = $this->get( 'vs_wgp.repository.tablature_category' );
        
        if ( isset( $formPost['category_taxon'] ) ) {
            
            foreach ( $formPost['category_taxon'] as $taxonId ) {
                $category       = $repo->findOneBy( ['taxon' => $taxonId] );
                if ( $category ) {
                    $categories[]   = $category;
                    $entity->addCategory( $category );
                }
            }
            
            foreach ( $entity->getCategories() as $cat ) {
                if ( ! $categories->contains( $cat ) ) {
                    $entity->removeCategory( $cat );
                }
            }
        }
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
    
    private function getTabCategoriesTaxonomy()
    {
        $taxonomy   = $this->get( 'vs_application.repository.taxonomy' )->findByCode(
            $this->getParameter( 'vs_wgp.tablature-categories.taxonomy_code' )
        );
        
        return $taxonomy;
    }
}
