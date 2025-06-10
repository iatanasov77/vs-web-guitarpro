<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersBundle\Model\UserNotification as BaseModel;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "VSUM_UsersNotifications")]
class UserNotification extends BaseModel
{
    
}
