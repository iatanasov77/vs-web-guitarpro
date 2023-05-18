<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\ProductPicture as BaseProductPicture;

/**
 * @ORM\Table(name="VSPAY_ProductPictures")
 * @ORM\Entity
 */
class ProductPicture extends BaseProductPicture
{
    
}
