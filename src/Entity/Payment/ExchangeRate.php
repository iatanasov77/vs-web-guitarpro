<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\ExchangeRate as BaseExchangeRate;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_ExchangeRate")]
class ExchangeRate extends BaseExchangeRate
{
}