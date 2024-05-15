<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\PaymentMethod as PaymentMethodBase;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_PaymentMethod")]
class PaymentMethod extends PaymentMethodBase
{
}