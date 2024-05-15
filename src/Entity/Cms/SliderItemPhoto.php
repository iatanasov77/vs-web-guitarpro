<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\SliderItemPhoto as BaseSliderItemPhoto;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_SlidersItemsPhotos")]
class SliderItemPhoto extends BaseSliderItemPhoto
{
}