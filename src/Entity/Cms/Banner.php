<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\Banner as BaseBanner;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_Banners")]
class Banner extends BaseBanner
{
}
