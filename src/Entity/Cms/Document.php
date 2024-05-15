<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\Document as BaseDocument;

/**
 * MultiPageToc
 * 
 */
#[ORM\Entity]
#[ORM\Table(name: "VSCMS_Documents")]
class Document extends BaseDocument
{
    
}
