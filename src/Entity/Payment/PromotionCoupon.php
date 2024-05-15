<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\PromotionCoupon as BasePromotionCoupon;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_PromotionCoupons")]
class PromotionCoupon extends BasePromotionCoupon
{
}