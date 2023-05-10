<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Currency as BaseCurrency;

/**
 * @ORM\Table(name="VSPAY_Currency")
 * @ORM\Entity
 */
class Currency extends BaseCurrency
{
    
}