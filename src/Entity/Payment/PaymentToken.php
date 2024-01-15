<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\PaymentToken as PaymentTokenBase;

/**
 * @ORM\Table(name="VSPAY_PaymentTokens")
 * @ORM\Entity
 */
class PaymentToken extends PaymentTokenBase
{
}
