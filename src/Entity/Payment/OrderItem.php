<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\OrderItem as OrderItemBase;

/**
 * @ORM\Table(name="VSPAY_OrderItem")
 * @ORM\Entity
 */
class OrderItem extends OrderItemBase
{
    
}
