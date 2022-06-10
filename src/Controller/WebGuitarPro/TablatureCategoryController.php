<?php namespace App\Controller\WebGuitarPro;

use Symfony\Component\HttpFoundation\Request;
use Vankosoft\ApplicationBundle\Controller\AbstractCrudController;
use Vankosoft\ApplicationBundle\Controller\TaxonomyHelperTrait;

use App\Entity\TablatureCategory;

class TablatureCategoryController extends AbstractCrudController
{
    use TaxonomyHelperTrait;
    use GlobalFormsTrait;
    
    protected function customData( Request $request, $entity = NULL ): array
    {
        $taxonomy   = $this->get( 'vs_application.repository.taxonomy' )->findByCode(
            $this->getParameter( 'vs_wgp.tablature-categories.taxonomy_code' )
        );
        
        return [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'taxonomyId'                    => $taxonomy->getId(),
            'locales'                       => $this->getDoctrine()->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->get( 'vs_users_subscriptions.repository.payed_service' )->findAll(),
        ];
    }
    
    protected function prepareEntity( &$entity, &$form, Request $request )
    {
        $entity->setUser( $this->getUser() );
        
        $translatableLocale     = $form['currentLocale']->getData();
        $categoryName           = $form['name']->getData();
        //$parentCategory         = $form['parent']->getData();
        $parentCategory         = $this->easyuiPost( $entity, $request->request->get( 'tablature_category_form' ) );
        
        /*
         * Create Category
         */
        if ( ! $translatableLocale ) {
            $translatableLocale = $request->getLocale();
        }
        $this->createTablatureCategory( $entity, $categoryName, $translatableLocale, $parentCategory );
    }
    
    private function easyuiPost( TablatureCategory &$entity, $formPost )
    {
        $repo       = $this->get( 'vs_wgp.repository.tablature_category' );
        if ( isset( $formPost['parent'] ) ) {
            return $repo->findOneBy( ['taxon' => $formPost['parent']] );
        }
        
        return null;
    }
    
    private function createTablatureCategory(
        TablatureCategory &$tablatureCategory,
        string $name,
        string $locale,
        ?TablatureCategory $parentCategory
    ): void
    {
        if ( $tablatureCategory->getTaxon() ) {
            $tablatureCategory->getTaxon()->setCurrentLocale( $locale );
            $tablatureCategory->getTaxon()->setName( $name );
            if ( $parentCategory ) {
                $tablatureCategory->getTaxon()->setParent( $parentCategory->getTaxon() );
            }
            
            $tablatureCategory->setParent( $parentCategory );
        } else {
            /*
             * @WORKAROUND Create Taxon If not exists
             */
            $taxonomy   = $this->get( 'vs_application.repository.taxonomy' )->findByCode(
                $this->getParameter( 'vs_wgp.tablature-categories.taxonomy_code' )
            );
            $newTaxon   = $this->createTaxon(
                $name,
                $locale,
                $parentCategory ? $parentCategory->getTaxon() : null,
                $taxonomy->getId()
            );
            
            $tablatureCategory->setTaxon( $newTaxon );
            $tablatureCategory->setParent( $parentCategory );
        }
    }
}
