<?php namespace App\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CatalogBundle\Model\PricingPlan as BasePricingPlan;

#[ORM\Entity]
#[ORM\Table(name: "VSCAT_PricingPlans")]
class PricingPlan extends BasePricingPlan
{
}
