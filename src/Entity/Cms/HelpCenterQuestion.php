<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Vankosoft\CmsBundle\Model\HelpCenterQuestion as BaseHelpCenterQuestion;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "VSCMS_HelpCenterQuestions")]
class HelpCenterQuestion extends BaseHelpCenterQuestion
{
}