<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersBundle\Model\AvatarImage as BaseAvatarImage;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "VSUM_AvatarImage")]
class AvatarImage extends BaseAvatarImage
{
    
}
