<?php namespace App\Entity\UsersSubscriptions;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersSubscriptionsBundle\Model\PayedServiceCategory as PayedServiceCategoryBase;

/**
 * @ORM\Entity
 * @ORM\Table(name="VSUS_PayedServiceCategories")
 */
class PayedServiceCategory extends PayedServiceCategoryBase
{
    
}
