<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\FileManagerFile as BaseFileManagerFile;

/**
 * MultiPageToc
 *
 * @ORM\Table(name="VSCMS_FileManagerFile")
 * @ORM\Entity
 */
class FileManagerFile extends BaseFileManagerFile
{
    
}
