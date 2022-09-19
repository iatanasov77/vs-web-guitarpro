<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Entity\UserManagement\User;

/**
 * @ORM\Entity
 * @ORM\Table( name="WGP_TablatureShares",
 *              uniqueConstraints={@ORM\UniqueConstraint(name="owner_share_unique_idx", columns={"owner_id", "name"})}
 *            )
 */
class TablatureShare implements ResourceInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserManagement\User", inversedBy="myShares")
     * @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     */
    private $owner;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\UserManagement\User", inversedBy="targetedShares")
     * @ORM\JoinTable(name="WGP_Users_TablatureShares",
     *      joinColumns={@ORM\JoinColumn(name="share_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")}
     * )
     */
    private $targetUsers;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tablature")
     * @ORM\JoinTable(name="WGP_TablatureShares_Tablatures",
     *      joinColumns={@ORM\JoinColumn(name="share_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tablature_id", referencedColumnName="id")}
     * )
     */
    private $tablatures;
    
    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;
    
    public function __construct()
    {
        $this->targetUsers  = new ArrayCollection();
        $this->tablatures   = new ArrayCollection();
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getOwner()
    {
        return $this->owner;
    }
    
    public function setOwner($owner)
    {
        $this->owner = $owner;
        
        return $this;
    }
    
    public function getTargetUsers()
    {
        return $this->targetUsers;
    }
    
    public function setTargetUsers($targetUsers)
    {
        $this->targetUsers = $targetUsers;
        
        return $this;
    }
    
    public function addTargetUser( User $user ): self
    {
        if ( ! $this->targetUsers->contains( $user ) ) {
            $this->targetUsers[] = $user;
        }
        
        return $this;
    }
    
    public function removeTargetUser( User $user ): self
    {
        if ( $this->targetUsers->contains( $user ) ) {
            $this->targetUsers->removeElement( $user );
        }
        
        return $this;
    }
    
    public function getTablatures()
    {
        return $this->tablatures;
    }
    
    public function setTablatures($tablatures)
    {
        $this->tablatures = $tablatures;
        
        return $this;
    }
    
    public function addTablature( Tablature $tablature ): self
    {
        if ( ! $this->tablatures->contains( $tablature ) ) {
            $this->tablatures[] = $tablature;
        }
        
        return $this;
    }
    
    public function removeTablature( User $tablature ): self
    {
        if ( $this->tablatures->contains( $tablature ) ) {
            $this->tablatures->removeElement( $tablature );
        }
        
        return $this;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        $this->name = $name;
        
        return $this;
    }
}
