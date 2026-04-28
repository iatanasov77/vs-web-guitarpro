<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Application as BaseApplication;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_Applications")]
class Application extends BaseApplication
{
}
