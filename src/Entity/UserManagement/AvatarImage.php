<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersBundle\Model\AvatarImage as BaseAvatarImage;

#[ORM\Entity]
#[ORM\Table(name: "VSUM_AvatarImage")]
class AvatarImage extends BaseAvatarImage
{
    
}
