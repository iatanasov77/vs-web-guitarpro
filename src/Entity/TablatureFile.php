<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\File;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "WGP_Tablatures_Files")]
class TablatureFile extends File
{
    /** @var Tablature */
    #[ORM\OneToOne(targetEntity: Tablature::class, inversedBy: "tablatureFile", cascade: ["persist", "remove"], orphanRemoval: true)]
    #[ORM\JoinColumn(name: "owner_id", referencedColumnName: "id", nullable: false, onDelete: "CASCADE")]
    protected $owner;
    
    public function getTablature()
    {
        return $this->owner;
    }
    
    public function setTablature( Tablature $tablature ): self
    {
        $this->setOwner( $tablature);
        
        return $this;
    }
}
