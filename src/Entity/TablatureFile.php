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
