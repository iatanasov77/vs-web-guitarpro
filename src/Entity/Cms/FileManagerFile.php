<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\FileManagerFile as BaseFileManagerFile;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_FileManagerFile")]
class FileManagerFile extends BaseFileManagerFile
{
    
}
