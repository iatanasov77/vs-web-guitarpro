<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\TaxonImage as BaseTaxonImage;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_TaxonImage")]
class TaxonImage extends BaseTaxonImage
{
}
