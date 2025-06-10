<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\WidgetsRegistry as BaseWidgetsRegistry;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "VSAPP_WidgetsRegistry")]
#[ORM\Cache(usage: "NONSTRICT_READ_WRITE")]
class WidgetsRegistry extends BaseWidgetsRegistry
{
}
