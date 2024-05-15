<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\SliderItem as BaseSliderItem;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_SlidersItems")]
class SliderItem extends BaseSliderItem
{
}