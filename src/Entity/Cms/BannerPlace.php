<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\BannerPlace as BaseBannerPlace;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_BannerPlaces")]
class BannerPlace extends BaseBannerPlace
{
}
