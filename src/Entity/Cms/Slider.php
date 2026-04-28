<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\Slider as BaseSlider;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_Sliders")]
class Slider extends BaseSlider
{
}