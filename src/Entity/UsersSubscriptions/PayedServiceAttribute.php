<?php namespace App\Entity\UsersSubscriptions;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersSubscriptionsBundle\Model\PayedServiceAttribute as PayedServiceAttributeBase;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "VSUS_PayedServicesAttributes")]
class PayedServiceAttribute extends PayedServiceAttributeBase
{
    
}

