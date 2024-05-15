<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\TagsWhitelistContext as BaseTagsWhitelistContext;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_TagsWhitelistContexts")]
class TagsWhitelistContext extends BaseTagsWhitelistContext
{
}
