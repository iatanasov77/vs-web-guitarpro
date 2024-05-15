<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Taxonomy as BaseTaxonomy;

#[ORM\Entity]
#[ORM\Table(name: "VSAPP_Taxonomy")]
class Taxonomy extends BaseTaxonomy
{
    
}
