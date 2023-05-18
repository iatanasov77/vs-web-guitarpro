<?php namespace App\Entity\Cms;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\TocPage as BaseTocPage;

/**
 * MultiPageToc
 *
 * @Gedmo\Loggable(logEntryClass="App\Entity\Application\LogEntry")
 * @Gedmo\TranslationEntity(class="App\Entity\Application\Translation")
 * @ORM\Table(name="VSCMS_TocPage")
 * @ORM\Entity
 */
class TocPage extends BaseTocPage
{
    
}
