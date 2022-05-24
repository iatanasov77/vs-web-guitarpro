<?php namespace App\Entity\UsersSubscriptions;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersSubscriptionsBundle\Model\PayedServiceSubscriptionPeriod as PayedServiceSubscriptionPeriodBase;
use Vankosoft\PaymentBundle\Model\Interfaces\PayableObjectInterface;
use Vankosoft\PaymentBundle\Model\Traits\PayableObjectTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="VSUS_PayedServiceSubscriptionPeriods")
 */
class PayedServiceSubscriptionPeriod extends PayedServiceSubscriptionPeriodBase implements PayableObjectInterface
{
    use PayableObjectTrait;
}
