<?php namespace App\Entity\Cms;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Vankosoft\CmsBundle\Model\HelpCenterQuestion as BaseHelpCenterQuestion;

#[ORM\Entity]
#[ORM\Table(name: "VSCMS_HelpCenterQuestions")]
class HelpCenterQuestion extends BaseHelpCenterQuestion
{
}