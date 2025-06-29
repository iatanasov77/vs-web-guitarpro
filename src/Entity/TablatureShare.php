<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Entity\UserManagement\User;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "WGP_TablatureShares")]
#[ORM\UniqueConstraint(name: 'owner_share_unique_idx', columns: ["owner_id", "name"])]
class TablatureShare implements ResourceInterface
{
    /** @var int */
    #[ORM\Id, ORM\Column(type: "integer"), ORM\GeneratedValue(strategy: "IDENTITY")]
    private $id;
    
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "myShares")]
    #[ORM\JoinColumn(name: "owner_id", referencedColumnName: "id")]
    private $owner;
    
    /** @var Collection|User[] */
    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: "targetedShares", indexBy: "id")]
    #[ORM\JoinTable(name: "WGP_Users_TablatureShares")]
    #[ORM\JoinColumn(name: "share_id", referencedColumnName: "id")]
    #[ORM\InverseJoinColumn(name: "user_id", referencedColumnName: "id")]
    private $targetUsers;
    
    /** @var Collection|Tablature[] */
    #[ORM\ManyToMany(targetEntity: Tablature::class, inversedBy: "shares", indexBy: "id")]
    #[ORM\JoinTable(name: "WGP_TablatureShares_Tablatures")]
    #[ORM\JoinColumn(name: "share_id", referencedColumnName: "id")]
    #[ORM\InverseJoinColumn(name: "tablature_id", referencedColumnName: "id")]
    private $tablatures;
    
    /** @var string */
    #[ORM\Column(type: "string", length: 255, nullable: false)]
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
    
    public function getTargetUsers(): Collection
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
    
    public function getTablatures(): Collection
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
