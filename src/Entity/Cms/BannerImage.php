<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\BannerImage as BaseBannerImage;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_BannerImages")]
class BannerImage extends BaseBannerImage
{
}
