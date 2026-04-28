<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\DocumentCategory as DocumentCategoryBase;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_DocumentCategories")]
class DocumentCategory extends DocumentCategoryBase
{
    
}
