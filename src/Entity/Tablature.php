<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="APP_Tablatures")
 */
class Tablature
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string")
     */
    private $tablature;
    
    public function getId()
    {
        return $this->id; 
    }
    
    public function getTablature()
    {
        return $this->tablature;
    }
    
    public function setTablature($tablature)
    {
        $this->tablature = $tablature;
        
        return $this;
    }
}
