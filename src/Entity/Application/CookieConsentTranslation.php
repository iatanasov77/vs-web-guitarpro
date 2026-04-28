<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\CookieConsentTranslation as BaseCookieConsentTranslation;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_CookieConsentTranslations")]
class CookieConsentTranslation extends BaseCookieConsentTranslation
{
    
}