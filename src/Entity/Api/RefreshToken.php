<?php namespace App\Entity\Api;

use Doctrine\ORM\Mapping as ORM;
use Gesdinet\JWTRefreshTokenBundle\Entity\RefreshToken as BaseRefreshToken;

/**
 * @ORM\Entity
 * @ORM\Table("VSAPI_RefreshTokens")
 */
class RefreshToken extends BaseRefreshToken
{
}
