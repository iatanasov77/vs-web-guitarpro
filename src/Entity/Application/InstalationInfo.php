<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationInstalatorBundle\Model\InstalationInfo as BaseInstalationInfo;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_InstalationInfo")]
class InstalationInfo extends BaseInstalationInfo
{
}
