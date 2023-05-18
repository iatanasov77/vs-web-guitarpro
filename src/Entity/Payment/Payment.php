<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Payment as PaymentBase;

/**
 * @ORM\Table(name="VSPAY_Payment")
 * @ORM\Entity
 */
class Payment extends PaymentBase
{
    
}