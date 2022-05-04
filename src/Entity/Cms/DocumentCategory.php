<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\DocumentCategory as DocumentCategoryBase;

/**
 * @ORM\Table(name="VSCMS_DocumentCategories")
 * @ORM\Entity
 */
class DocumentCategory extends DocumentCategoryBase
{
    
}
