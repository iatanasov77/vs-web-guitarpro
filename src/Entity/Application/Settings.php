<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Settings as GeneralSettings;

/**
 * @ORM\Table(name="VSAPP_Settings")
 * @ORM\Entity
 */
class Settings extends GeneralSettings
{

}
