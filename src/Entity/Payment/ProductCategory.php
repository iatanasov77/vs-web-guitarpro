<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\ProductCategory as ProductCategoryBase;

/**
 * @ORM\Table(name="VSPAY_ProductCategories")
 * @ORM\Entity
 */
class ProductCategory extends ProductCategoryBase
{
    
}
