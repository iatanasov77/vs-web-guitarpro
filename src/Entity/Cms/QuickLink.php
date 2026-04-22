<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\QuickLink as BaseQuickLink;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_QuickLinks")]
class QuickLink extends BaseQuickLink
{
}