<?php namespace App\Entity\UsersSubscriptions;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersSubscriptionsBundle\Model\PayedServiceAttribute as PayedServiceAttributeBase;

/**
 * @ORM\Entity
 * @ORM\Table(name="VSUS_PayedServicesAttributes")
 */
class PayedServiceAttribute extends PayedServiceAttributeBase
{
    
}

