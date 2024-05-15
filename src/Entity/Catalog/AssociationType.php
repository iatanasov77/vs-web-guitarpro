<?php namespace App\Entity\Catalog;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CatalogBundle\Model\AssociationType as BaseAssociationType;

#[ORM\Entity]
#[ORM\Table(name: "VSCAT_AssociationTypes")]
class AssociationType extends BaseAssociationType
{
}
