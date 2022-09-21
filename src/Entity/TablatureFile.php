<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\CmsBundle\Model\File;

/**
 * @ORM\Entity
 * @ORM\Table(name="WGP_Tablatures_Files")
 */
class TablatureFile extends File
{
    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Tablature", inversedBy="tablatureFile", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    protected $owner;
    
    /**
     * @ORM\Column(name="original_name", type="string", length=255, nullable=false, options={"comment": "The Original Name of the File."})
     */
    protected $originalName;
    
    public function getTablature()
    {
        return $this->owner;
    }
    
    public function setTablature( Tablature $tablature ): self
    {
        $this->setOwner( $tablature);
        
        return $this;
    }
    
    public function getOriginalName(): string
    {
        return $this->originalName;
    }
    
    public function setOriginalName( string $originalName ): self
    {
        $this->originalName = $originalName;
        
        return $this;
    }
}
