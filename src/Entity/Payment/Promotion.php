<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Promotion as BasePromotion;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_Promotions")]
class Promotion extends BasePromotion
{
}