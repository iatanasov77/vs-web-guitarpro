<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Order as OrderBase;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_Order")]
class Order extends OrderBase
{
}