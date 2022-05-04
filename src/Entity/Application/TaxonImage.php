<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\TaxonImage as BaseTaxonImage;

/**
 * @ORM\Table(name="VSAPP_TaxonImage")
 * @ORM\Entity
 */
class TaxonImage extends BaseTaxonImage
{
}
