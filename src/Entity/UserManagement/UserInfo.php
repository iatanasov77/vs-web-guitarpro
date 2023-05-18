<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersBundle\Model\UserInfo as BaseUserInfo;

/**
 * @ORM\Entity
 * @ORM\Table(name="VSUM_UsersInfo")
 */
class UserInfo extends BaseUserInfo
{
    
}
