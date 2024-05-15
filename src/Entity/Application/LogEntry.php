<?php  namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\LogEntry as BaseLogEntry;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_LogEntries")]
class LogEntry extends BaseLogEntry
{
     
}
