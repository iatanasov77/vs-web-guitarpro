<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Translation as BaseTranslation;

/**
 * @ORM\Table(name="VSAPP_Translations")
 * @ORM\Entity
 */
class Translation extends BaseTranslation
{
     
}
