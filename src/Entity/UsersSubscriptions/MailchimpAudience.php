<?php namespace App\Entity\UsersSubscriptions;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersSubscriptionsBundle\Model\MailchimpAudience as MailchimpAudienceBase;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "VSUS_MailchimpAudiences")]
class MailchimpAudience extends MailchimpAudienceBase
{
    
}
