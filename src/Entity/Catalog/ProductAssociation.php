<?php namespace App\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CatalogBundle\Model\ProductAssociation as BaseProductAssociation;

#[ORM\Entity]
#[ORM\Table(name: "VSCAT_ProductAssociations")]
class ProductAssociation extends BaseProductAssociation
{
}
