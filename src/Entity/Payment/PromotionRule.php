<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\PromotionRule as BasePromotionRule;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_PromotionRules")]
class PromotionRule extends BasePromotionRule
{
}