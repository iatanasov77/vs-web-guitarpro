<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/*
 * Maikati deeba za6to
 */
//use IA\UsersBundle\Entity\User as BaseUser;
use FOS\UserBundle\Model\User as BaseUser;

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
    
    public function __construct() {
        parent::__construct();
        
        $this->tablatures = new ArrayCollection();
    }
    
    /**
     * @return Collection|Tablature[]
     */
    public function getTablatures()
    {
        return $this->tablatures;
    }
}
