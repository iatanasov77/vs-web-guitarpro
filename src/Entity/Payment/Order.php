<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Order as OrderBase;

/**
 * @ORM\Table(name="VSPAY_Order")
 * @ORM\Entity
 */
class Order extends OrderBase
{
    
}
