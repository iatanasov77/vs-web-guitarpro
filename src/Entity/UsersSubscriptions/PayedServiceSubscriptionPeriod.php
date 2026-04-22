<?php namespace App\Entity\UsersSubscriptions;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersSubscriptionsBundle\Model\PayedServiceSubscriptionPeriod as PayedServiceSubscriptionPeriodBase;

#[ORM\Entity]
#[ORM\Table(name: "VSUS_PayedServiceSubscriptionPeriods")]
class PayedServiceSubscriptionPeriod extends PayedServiceSubscriptionPeriodBase
{
    
}
