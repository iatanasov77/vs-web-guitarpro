<?php namespace App\Entity\Cms;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\TocPage as BaseTocPage;

/**
 * MultiPageToc
 * 
 */
#[ORM\Entity]
#[ORM\Table(name: "VSCMS_TocPage")]
class TocPage extends BaseTocPage
{
    
}
