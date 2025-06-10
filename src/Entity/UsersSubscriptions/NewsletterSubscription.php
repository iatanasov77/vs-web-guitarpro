<?php namespace App\Entity\UsersSubscriptions;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersSubscriptionsBundle\Model\NewsletterSubscription as NewsletterSubscriptionBase;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "VSUS_NewsletterSubscriptions")]
class NewsletterSubscription extends NewsletterSubscriptionBase
{
    
}
