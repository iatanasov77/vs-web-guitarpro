<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersBundle\Model\UserActivity as BaseModel;

/**
 * @ORM\Entity
 * @ORM\Table(name="VSUM_UsersActivities")
 */
class UserActivity extends BaseModel
{
    
}
