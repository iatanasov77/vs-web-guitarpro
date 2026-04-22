<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Widget as BaseWidget;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_Widgets")]
class Widget extends BaseWidget
{
}
