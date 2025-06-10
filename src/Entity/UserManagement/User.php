<?php namespace App\Entity\UserManagement;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\UsersBundle\Model\User as BaseUser;

use Vankosoft\UsersSubscriptionsBundle\Model\Interfaces\SubscribedUserInterface;
use Vankosoft\UsersSubscriptionsBundle\Model\Traits\SubscribedUserEntity;
use Vankosoft\PaymentBundle\Model\Interfaces\UserPaymentAwareInterface;
use Vankosoft\PaymentBundle\Model\Traits\UserPaymentAwareEntity;
use Vankosoft\PaymentBundle\Model\Interfaces\CustomerInterface;
use Vankosoft\PaymentBundle\Model\Traits\CustomerEntity;
use Vankosoft\CatalogBundle\Model\Interfaces\UserSubscriptionAwareInterface;
use Vankosoft\CatalogBundle\Model\Traits\UserSubscriptionAwareEntity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

use App\Entity\TablatureCategory;
use App\Entity\Tablature;
use App\Entity\TablatureShareUserTrait;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "VSUM_Users")]
class User extends BaseUser implements
    SubscribedUserInterface,
    UserPaymentAwareInterface,
    CustomerInterface,
    UserSubscriptionAwareInterface
{
    use SubscribedUserEntity;
    use UserPaymentAwareEntity;
    use CustomerEntity;
    use UserSubscriptionAwareEntity;
    
    use TablatureShareUserTrait;
    
    #[ORM\OneToMany(targetEntity: TablatureCategory::class, mappedBy: "user", indexBy: "id")]
    protected $tabCategories;
    
    #[ORM\OneToMany(targetEntity: Tablature::class, mappedBy: "user", indexBy: "id")]
    protected $tablatures;
    
    #[ORM\ManyToMany(targetEntity: Tablature::class, inversedBy: "favoriteUsers", indexBy: "id")]
    #[ORM\JoinTable(name: "WGP_Users_Favorites")]
    #[ORM\JoinColumn(name: "user_id", referencedColumnName: "id")]
    #[ORM\InverseJoinColumn(name: "favorite_id", referencedColumnName: "id")]
    protected $favorites;
    
    public function __construct()
    {
        $this->newsletterSubscriptions  = new ArrayCollection();
        $this->orders                   = new ArrayCollection();
        $this->pricingPlanSubscriptions = new ArrayCollection();
        
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
