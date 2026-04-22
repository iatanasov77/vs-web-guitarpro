<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Adjustment as BaseAdjustment;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_Adjustments")]
class Adjustment extends BaseAdjustment
{
}