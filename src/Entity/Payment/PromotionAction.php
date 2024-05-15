<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\PromotionAction as BasePromotionAction;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_PromotionActions")]
class PromotionAction extends BasePromotionAction
{
}