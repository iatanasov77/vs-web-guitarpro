<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/*
 * Maikati deeba za6to
 */
use IA\UsersBundle\Entity\Model\User as BaseUser;
//use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Entity
 * @ORM\Table(name="APP_Users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tablature", mappedBy="user")
     */
    protected $tablatures;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tablature", inversedBy="favoriteUsers")
     * @ORM\JoinTable(name="APP_Users_Favorites", 
     * joinColumns={@ORM\JoinColumn(name="userId", referencedColumnName="id")}, 
     * inverseJoinColumns={@ORM\JoinColumn(name="favoriteId", referencedColumnName="id")}
     * )
     */
    protected $favorites;
    
    public function __construct() {
        $this->tablatures   = new ArrayCollection();
        $this->favorites    = new ArrayCollection();
        
        parent::__construct();
    }
    
    /**
     * @return Collection|Tablature[]
     */
    public function getTablatures()
    {
        return $this->tablatures;
    }
    
    /**
     * @return Collection|Tablature[]
     */
    public function getFavorites()
    {
        return $this->favorites;
    }
    
    public function addFavorite(Tablature $tablature): self
    {
        if (!$this->favorites->contains($tablature)) {
            $this->favorites[] = $tablature;
        }
        
        return $this;
    }
    
    public function removeFavorite(Tablature $tablature): self
    {
        if ($this->favorites->contains($tablature)) {
            $this->favorites->removeElement($tablature);
        }
        return $this;
    }
}
