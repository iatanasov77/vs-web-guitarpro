<?php namespace App\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CatalogBundle\Model\Product as BaseProduct;

#[ORM\Entity]
#[ORM\Table(name: "VSCAT_Products")]
class Product extends BaseProduct
{
}
