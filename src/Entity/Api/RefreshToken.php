<?php namespace App\Entity\Api;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApiBundle\Model\RefreshToken as BaseRefreshToken;

#[ORM\Entity]
#[ORM\Table(name: "VSAPI_RefreshTokens")]
class RefreshToken extends BaseRefreshToken
{
}
