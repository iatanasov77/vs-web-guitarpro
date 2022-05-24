<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\Token as TokenBase;

/**
 * ORM\Table(name="VSPAY_Tokens")
 * ORM\Entity
 */
class Token extends TokenBase
{
}
