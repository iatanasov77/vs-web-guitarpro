<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Vankosoft\ApplicationBundle\Model\Interfaces\TaxonDescendentInterface;
use Vankosoft\ApplicationBundle\Model\Traits\TaxonDescendentEntity;
use App\Entity\UserManagement\User;

#[ORM\Entity]
#[ORM\Table(name: "WGP_TablatureCategories")]
class TablatureCategory implements ResourceInterface, TaxonDescendentInterface
{
    use TaxonDescendentEntity;
    
    /** @var int */
    #[ORM\Id, ORM\Column(type: "integer"), ORM\GeneratedValue(strategy: "IDENTITY")]
    private $id;
    
    /** @var User */
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "tabCategories")]
    private $user;
    
    /** @var TablatureCategory */
    #[ORM\ManyToOne(targetEntity: TablatureCategory::class, inversedBy: "children", cascade: ["all"])]
    private $parent;
    
    /** @var TablatureCategory[] */
    #[ORM\OneToMany(targetEntity: TablatureCategory::class, mappedBy: "parent", indexBy: "id", cascade: ["persist", "remove"], orphanRemoval: true)]
    private $children;
    
    #[ORM\ManyToMany(targetEntity: Tablature::class, mappedBy: "categories", indexBy: "id")]
    private $tablatures;
    
    public function __construct()
    {
        $this->children     = new ArrayCollection();
        $this->tablatures   = new ArrayCollection();
    }
    
    /**
     * {@inheritdoc}
     */
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
    
    /**
     * {@inheritdoc}
     */
    public function getParent(): ?TablatureCategory
    {
        return $this->parent;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setParent(?TablatureCategory $parent): TablatureCategory
    {
        $this->parent = $parent;
        
        return $this;
    }
    
    public function getChildren(): Collection
    {
        return $this->children;
    }
    
    /**
     * @return Collection|Tablature[]
     */
    public function getTablatures(): Collection
    {
        return $this->tablatures;
    }
    
    public function addTabllature( Tablature $tablature ): TablatureCategory
    {
        if ( ! $this->tablatures->contains( $tablature ) ) {
            $this->tablatures[] = $tablature;
            $tablature->addCategory( $this );
        }
        
        return $this;
    }
    
    public function removeTablature( Tablature $tablature ): TablatureCategory
    {
        if ( $this->tablatures->contains( $tablature ) ) {
            $this->tablatures->removeElement( $tablature );
            $tablature->removeCategory( $this );
        }
        
        return $this;
    }
    
    public function __toString()
    {
        return $this->taxon ? $this->taxon->getName() : '';
    }
    
    public function getNameTranslated( string $locale )
    {
        return $this->taxon ? $this->taxon->getTranslation( $locale )->getName() : '';
    }
}
