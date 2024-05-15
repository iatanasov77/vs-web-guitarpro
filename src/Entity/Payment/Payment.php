<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Payment as PaymentBase;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_Payment")]
class Payment extends PaymentBase
{
}