<?php  namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\LogEntry as BaseLogEntry;

/**
 * @ORM\Table(name="VSAPP_LogEntries")
 * @ORM\Entity
 */
class LogEntry extends BaseLogEntry
{
     
}
