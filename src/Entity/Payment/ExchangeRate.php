<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\ExchangeRate as BaseExchangeRate;

/**
 * @ORM\Table(name="VSPAY_ExchangeRate")
 * @ORM\Entity
 */
class ExchangeRate extends BaseExchangeRate
{
    
}