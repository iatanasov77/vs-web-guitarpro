<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
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
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tablatures")
     * @ORM\JoinColumn(name="userId", referencedColumnName="id")
     */
    private $user;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\User", mappedBy="favorites", cascade={"persist"})
     */
    private $favoriteUsers;
    
    /**
     * @ORM\Column(type="string")
     */
    private $artist;
    
    /**
     * @ORM\Column(type="string")
     */
    private $song;
    
    /**
     * @ORM\Column(type="string")
     */
    private $tablature;
    
    public function getId()
    {
        return $this->id; 
    }
    
    public function getUser()
    {
        return $this->user;
    }
    
    public function setUser($user)
    {
        $this->user = $user;
        
        return $this;
    }
    
    public function addFavoriteUsers(User $user)
    {
        $this->favoriteUsers[] = $user;
    }
    
    /**
     * Get items
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getFavoriteUsers()
    {
        return $this->favoriteUsers;
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
    
    public function getArtist()
    {
        return $this->artist;
    }
    
    public function setArtist($artist)
    {
        $this->artist   = $artist;
        
        return $this;
    }
    
    public function getSong()
    {
        return $this->song;
    }
    
    public function setSong($song)
    {
        $this->song = $song;
        
        return $this;
    }
}
