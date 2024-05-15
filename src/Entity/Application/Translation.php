<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Translation as BaseTranslation;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_Translations")]
class Translation extends BaseTranslation
{
     
}
