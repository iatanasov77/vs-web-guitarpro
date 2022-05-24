<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\PaymentMethod as PaymentMethodBase;

/**
 * @ORM\Table(name="VSPAY_PaymentMethod")
 * @ORM\Entity
 */
class PaymentMethod extends PaymentMethodBase
{
    
}