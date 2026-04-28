<?php namespace App\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CatalogBundle\Model\PricingPlanCategory as BasePricingPlanCategory;

#[ORM\Entity]
#[ORM\Table(name: "VSCAT_PricingPlanCategories")]
class PricingPlanCategory extends BasePricingPlanCategory
{
}
