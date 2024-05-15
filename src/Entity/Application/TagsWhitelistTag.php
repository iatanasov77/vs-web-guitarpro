<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\TagsWhitelistTag as BaseTagsWhitelistTag;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_TagsWhitelistTags")]
class TagsWhitelistTag extends BaseTagsWhitelistTag
{
}
