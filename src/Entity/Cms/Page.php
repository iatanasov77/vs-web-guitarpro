<?php namespace App\Entity\Cms;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\Page as BasePage;

/**
 * Page
 *
 * @Gedmo\Loggable(logEntryClass="App\Entity\Application\LogEntry")
 * @Gedmo\TranslationEntity(class="App\Entity\Application\Translation")
 * @ORM\Table(name="VSCMS_Pages")
 * @ORM\Entity
 */
class Page extends BasePage
{
    
}
