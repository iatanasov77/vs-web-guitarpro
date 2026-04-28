<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\FileManager as BaseFileManager;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_FileManager")]
class FileManager extends BaseFileManager
{
    
}
