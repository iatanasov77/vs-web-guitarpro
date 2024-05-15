<?php namespace App\Entity\Payment;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\PaymentBundle\Model\GatewayConfig as GatewayConfigBase;

#[ORM\Entity]
#[ORM\Table(name: "VSPAY_GatewayConfig")]
class GatewayConfig extends GatewayConfigBase
{
}