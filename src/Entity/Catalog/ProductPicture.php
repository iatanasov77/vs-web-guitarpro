<?php namespace App\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CatalogBundle\Model\ProductPicture as BaseProductPicture;

#[ORM\Entity]
#[ORM\Table(name: "VSCAT_ProductPictures")]
class ProductPicture extends BaseProductPicture
{
}
