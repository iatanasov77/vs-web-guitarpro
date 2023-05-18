<?php namespace App\Controller\Api;

trait TaxonomyHelperTrait
{
    protected function createTaxon( $name, $locale, $parent, $taxonomyId )
    {
        $taxon  = $this->taxonFactory->createNew();
        
        $taxon->setCurrentLocale( $locale );
        $taxon->setName( $name );
        
        $slug   = $this->createTaxonCode( $name );
        
        $taxon->setCode( $slug );
        $taxon->setSlug( $slug );
        
        if ( ! $parent ) {
            $parent     = $this->taxonomy->getRootTaxon();
        }
        $taxon->setParent( $parent );
        
        return $taxon;
    }
    
    protected function createTaxonCode( $taxonName )
    {
        $code           = $this->slugGenerator->generate( $taxonName );
        $useThisCode    = $code;
        $i              = 0;
        
        while( $this->taxonRepository->findByCode( $useThisCode ) ) {
            $i++;
            $useThisCode    = $code . '-' . $i;
        }
        
        return $useThisCode;
    }
    
    protected function createTranslation( $taxon, $locale, $name )
    {
        $translation    = $taxon->createNewTranslation();
        
        $translation->setLocale( $locale );
        $translation->setName( $name );
        $translation->setSlug( $this->get( 'vs_application.slug_generator' )->generate( $name ) );
        
        return $translation;
    }
    
    protected function getTranslations()
    {
        $locales        = $this->get( 'vs_application.repository.locale' )->findAll();
        
        $translations   = [];
        foreach ( $this->resources->getCurrentPageResults() as $category ) {
            foreach( $locales as $locale ) {
                $category->getTaxon()->getTranslation( $locale->getCode() );
            }
            
            $translations[$category->getId()] = $category->getTaxon()->getExistingTranslations();
        }
        //echo "<pre>"; var_dump($translations); die;
        return $translations;
    }
}
