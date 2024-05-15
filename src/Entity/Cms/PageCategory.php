<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\PageCategory as PageCategoryBase;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_PageCategories")]
class PageCategory extends PageCategoryBase
{
    
}
