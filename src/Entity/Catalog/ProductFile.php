<?php namespace App\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CatalogBundle\Model\ProductFile as BaseProductFile;

#[ORM\Entity]
#[ORM\Table(name: "VSCAT_ProductFiles")]
class ProductFile extends BaseProductFile
{
}
