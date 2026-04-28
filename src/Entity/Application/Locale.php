<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Locale as BaseLocale;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_Locale")]
class Locale extends BaseLocale
{
}
