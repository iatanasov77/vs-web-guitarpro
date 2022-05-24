<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\GatewayConfig as GatewayConfigBase;

/**
 * @ORM\Table(name="VSPAY_GatewayConfig")
 * @ORM\Entity
 */
class GatewayConfig extends GatewayConfigBase
{
    
}