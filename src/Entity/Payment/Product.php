<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Product as BaseProduct;

/**
 * @ORM\Table(name="VSPAY_Products")
 * @ORM\Entity
 */
class Product extends BaseProduct
{
    
}
