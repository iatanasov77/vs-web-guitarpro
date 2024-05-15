<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\WidgetGroup as BaseWidgetGroup;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_WidgetGroups")]
class WidgetGroup extends BaseWidgetGroup
{
}
