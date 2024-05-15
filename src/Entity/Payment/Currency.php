<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Currency as BaseCurrency;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_Currency")]
class Currency extends BaseCurrency
{
}