<?php namespace App\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CatalogBundle\Model\PricingPlanSubscription as BasePricingPlanSubscription;

#[ORM\Entity]
#[ORM\Table(name: "VSCAT_PricingPlanSubscriptions")]
class PricingPlanSubscription extends BasePricingPlanSubscription
{
}