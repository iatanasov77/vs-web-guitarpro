<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\Page as BasePage;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_Pages")]
class Page extends BasePage
{
    
}
