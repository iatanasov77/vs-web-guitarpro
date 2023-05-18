<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Application as BaseApplication;

/**
 * @ORM\Table(name="VSAPP_Applications")
 * @ORM\Entity
 */
class Application extends BaseApplication
{
}
