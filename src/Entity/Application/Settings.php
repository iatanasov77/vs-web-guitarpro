<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Settings as GeneralSettings;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_Settings")]
class Settings extends GeneralSettings
{

}
