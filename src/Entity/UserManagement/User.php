<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersBundle\Model\User as BaseUser;
use Vankosoft\UsersSubscriptionsBundle\Model\Interfaces\SubscribedUserInterface;
use Vankosoft\UsersSubscriptionsBundle\Model\Traits\SubscribedUserTrait;
use Vankosoft\PaymentBundle\Model\Interfaces\PaymentsUserInterface;
use Vankosoft\PaymentBundle\Model\Traits\PaymentsUserTrait;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Entity\TablatureCategory;
use App\Entity\Tablature;
use App\Entity\TablatureShareUserTrait;

/**
 * @ORM\Entity
 * @ORM\Table(name="VSUM_Users")
 */
class User extends BaseUser implements SubscribedUserInterface, PaymentsUserInterface
{
    use SubscribedUserTrait;
    use PaymentsUserTrait;
    use TablatureShareUserTrait;
    
    /**
     * @var Collection|TablatureCategory[]
     *
     * @ORM\OneToMany(targetEntity="App\Entity\TablatureCategory", mappedBy="user")
     */
    protected $tabCategories;
    
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tablature", mappedBy="user")
     */
    protected $tablatures;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tablature", inversedBy="favoriteUsers")
     * @ORM\JoinTable(name="WGP_Users_Favorites",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="favorite_id", referencedColumnName="id")}
     * )
     */
    protected $favorites;
    
    public function __construct()
    {
        $this->paidSubscriptions    = new ArrayCollection();
        $this->orders               = new ArrayCollection();
        
        $this->tabCategories        = new ArrayCollection();
        $this->tablatures           = new ArrayCollection();
        $this->favorites            = new ArrayCollection();
        
        $this->myShares             = new ArrayCollection();
        $this->targetedShares       = new ArrayCollection();
        
        parent::__construct();
    }
    
    /**
     * {@inheritDoc}
     */
    public function getRoles(): array
    {
        /* Use RolesCollection */
        return $this->getRolesFromCollection();
    }
    
    /**
     * @return Collection|Tablature[]
     */
    public function getTabCategories(): Collection
    {
        return $this->tabCategories;
    }
    
    /**
     * @return Collection|Tablature[]
     */
    public function getTablatures(): Collection
    {
        return $this->tablatures;
    }
    
    /**
     * @return Collection|Tablature[]
     */
    public function getFavorites(): Collection
    {
        return $this->favorites;
    }
    
    public function addFavorite( Tablature $tablature ): self
    {
        if ( ! $this->favorites->contains( $tablature ) ) {
            $this->favorites[] = $tablature;
            $tablature->addFavoriteUsers( $this );
        }
        
        return $this;
    }
    
    public function removeFavorite( Tablature $tablature ): self
    {
        if ( $this->favorites->contains( $tablature ) ) {
            $this->favorites->removeElement( $tablature );
        }
        
        return $this;
    }
}
