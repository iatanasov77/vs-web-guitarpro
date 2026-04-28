<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\ExchangeRateService as BaseExchangeRateService;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_ExchangeRateServices")]
class ExchangeRateService extends BaseExchangeRateService
{
}
