<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersBundle\Model\ResetPasswordRequest as BaseResetPasswordRequest;

/**
 * @ORM\Entity(repositoryClass="Vankosoft\UsersBundle\Repository\ResetPasswordRequestRepository")
 * @ORM\Table(name="VSUM_ResetPasswordRequests")
 */
class ResetPasswordRequest extends BaseResetPasswordRequest
{
    
}