<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Taxon as BaseTaxon;
use Sylius\Component\Taxonomy\Model\TaxonTranslationInterface;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "VSAPP_Taxons")]
class Taxon extends BaseTaxon
{
    protected function createTranslation(): TaxonTranslationInterface
    {
        $translation   = new TaxonTranslation();
        $translation->setTranslatable( $this );
        
        return $translation;
    }
}
