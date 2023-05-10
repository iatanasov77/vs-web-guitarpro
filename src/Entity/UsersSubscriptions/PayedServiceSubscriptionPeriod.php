<?php namespace App\Entity\UsersSubscriptions;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersSubscriptionsBundle\Model\PayedServiceSubscriptionPeriod as PayedServiceSubscriptionPeriodBase;
use Vankosoft\PaymentBundle\Model\Interfaces\PayableObjectInterface;
use Vankosoft\PaymentBundle\Model\Traits\PaidServiceSubscriptionTrait;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="VSUS_PayedServiceSubscriptionPeriods")
 */
class PayedServiceSubscriptionPeriod extends PayedServiceSubscriptionPeriodBase implements PayableObjectInterface
{
    use PaidServiceSubscriptionTrait;
    
    public function __construct()
    {
        $this->orderItems   = new ArrayCollection();
        
        parent::__construct();
    }
    
    public function getSubscriptionCode(): ?string
    {
        return $this->getPayedService()->getSubscriptionCode();
    }
    
    public function getSubscriptionPriority(): ?int
    {
        return $this->getPayedService()->getSubscriptionPriority();
    }
}
