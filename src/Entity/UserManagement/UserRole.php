<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersBundle\Model\UserRole as BaseUserRole;

#[ORM\Entity]
#[ORM\Table(name: "VSUM_UserRoles")]
class UserRole extends BaseUserRole
{
}
