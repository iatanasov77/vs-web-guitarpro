<?php namespace App\Entity\UsersSubscriptions;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersSubscriptionsBundle\Model\PayedService as PayedServiceBase;

#[ORM\Entity]
#[ORM\Table(name: "VSUS_PayedServices")]
class PayedService extends PayedServiceBase
{
    
}
