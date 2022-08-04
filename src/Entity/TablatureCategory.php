<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Vankosoft\ApplicationBundle\Model\Interfaces\TaxonInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="WGP_TablatureCategories")
 */
class TablatureCategory implements ResourceInterface
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
     * @ORM\ManyToOne(targetEntity="App\Entity\UserManagement\User", inversedBy="tablatureCategories")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
    /**
     * @var TablatureCategory
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\TablatureCategory", inversedBy="children", cascade={"all"})
     */
    private $parent;
    
    /**
     * @var Collection|TablatureCategory[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\TablatureCategory", mappedBy="parent")
     */
    private $children;
    
     /**
      * @var Collection|Tablature[]
      * 
     * @ORM\ManyToMany(targetEntity="App\Entity\Tablature", mappedBy="categories")
     */
    private $tablatures;
    
    /**
     * @var TaxonInterface
     *
     * @ORM\OneToOne(targetEntity="App\Entity\Application\Taxon", cascade={"all"})
     * @ORM\JoinColumn(name="taxon_id", referencedColumnName="id", nullable=false, onDelete="CASCADE")
     */
    private $taxon;
    
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
    
    /**
     * {@inheritdoc}
     */
    public function getTaxon(): ?TaxonInterface
    {
        return $this->taxon;
    }
    
    /**
     * {@inheritdoc}
     */
    public function setTaxon(?TaxonInterface $taxon): void
    {
        $this->taxon = $taxon;
    }

    public function getName()
    {
        return $this->taxon ? $this->taxon->getName() : '';
    }
    
    public function setName( string $name ) : self
    {
        if ( ! $this->taxon ) {
            // Create new taxon into the controller and set the properties passed from form
            return $this;
        }
        $this->taxon->setName( $name );
        
        return $this;
    }
    
    public function __toString()
    {
        return $this->taxon ? $this->taxon->getName() : '';
    }
}
