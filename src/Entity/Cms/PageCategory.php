<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\PageCategory as PageCategoryBase;

/**
 * @ORM\Table(name="VSCMS_PageCategories")
 * @ORM\Entity
 */
class PageCategory extends PageCategoryBase
{
    
}
