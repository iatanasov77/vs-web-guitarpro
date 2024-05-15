<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\PaymentToken as PaymentTokenBase;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_PaymentTokens")]
class PaymentToken extends PaymentTokenBase
{
}