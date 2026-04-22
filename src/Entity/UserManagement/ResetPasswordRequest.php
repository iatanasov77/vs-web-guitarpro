<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersBundle\Model\ResetPasswordRequest as BaseResetPasswordRequest;

#[ORM\Entity]
#[ORM\Table(name: "VSUM_ResetPasswordRequests")]
class ResetPasswordRequest extends BaseResetPasswordRequest
{
}