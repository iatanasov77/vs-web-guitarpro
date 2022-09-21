<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Sylius\Component\Resource\Model\ResourceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Sylius\Component\Resource\Model\ToggleableTrait;

use App\Entity\UserManagement\User;

/**
 * @ORM\Entity
 * @ORM\Table(name="WGP_Tablatures")
 */
class Tablature implements ResourceInterface
{
    use TimestampableEntity;
    use ToggleableTrait;    // About enabled field - $enabled (public)
    
    /**
     * @var integer
     * 
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\UserManagement\User", inversedBy="tablatures")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\UserManagement\User", mappedBy="favorites", cascade={"persist"})
     */
    private $favoriteUsers;
    
    /**
     * @ORM\Column(name="artist", type="string", length=255, nullable=false)
     */
    private $artist;
    
    /**
     * @ORM\Column(name="song", type="string", length=255, nullable=false)
     */
    private $song;
    
    /**
     * @ORM\OneToOne(targetEntity=TablatureFile::class, mappedBy="owner", cascade={"persist", "remove"})
     */
    private $tablatureFile;
    
    /**
     * @ORM\ManyToMany(targetEntity=TablatureCategory::class, inversedBy="tablatures")
     * @ORM\JoinTable(name="WGP_Tablatures_Categories",
     *      joinColumns={@ORM\JoinColumn(name="tablature_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     * )
     */
    private $categories;
    
    /**
     * @Gedmo\Slug(fields={"artist", "song", "id"})
     * @ORM\Column(name="slug", type="string", length=255, nullable=false, unique=true)
     */
    private $slug;
    
    /**
     * @var bool
     *
     * @ORM\Column(name="public", type="boolean", options={"default":"1"})
     */
    protected $enabled = true;
    
    public function __construct()
    {
        $this->categories = new ArrayCollection();
    }
    
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
    public function getFavoriteUsers(): ?Collection
    {
        return $this->favoriteUsers;
    }
    
    public function getTablatureFile()
    {
        return $this->tablatureFile;
    }
    
    public function setTablatureFile($tablatureFile)
    {
        $this->tablatureFile = $tablatureFile;
        
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
    
    /**
     * @return Collection|TablatureCategory[]
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    public function addCategory( TablatureCategory $category ): self
    {
        if ( ! $this->categories->contains( $category ) ) {
            $this->categories[] = $category;
        }
        
        return $this;
    }
    
    public function removeCategory( TablatureCategory $category ): self
    {
        if ( $this->categories->contains( $category ) ) {
            $this->categories->removeElement( $category );
        }
        
        return $this;
    }
    
    public function getSlug(): ?string
    {
        return $this->slug;
    }
    
    public function setSlug($slug): self
    {
        $this->slug = $slug;
        
        return $this;
    }
    
    public function getName()
    {
        return $this->artist . ' - ' . $this->song;
    }
}
