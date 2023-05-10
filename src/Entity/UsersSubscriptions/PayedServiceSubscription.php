<?php namespace App\Entity\UsersSubscriptions;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersSubscriptionsBundle\Model\PayedServiceSubscription as PayedServiceSubscriptionBase;

/**
 * @ORM\Entity
 * @ORM\Table(name="VSUS_PayedServiceSubscriptions")
 */
class PayedServiceSubscription extends PayedServiceSubscriptionBase
{
    
}
