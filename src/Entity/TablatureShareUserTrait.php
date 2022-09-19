<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

trait TablatureShareUserTrait
{
    /**
     * @ORM\OneToMany(targetEntity="App\Entity\TablatureShare", mappedBy="owner")
     */
    protected $myShares;
    
    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\TablatureShare", mappedBy="targetUsers")
     */
    protected $targetedShares;
    
    /**
     * @return Collection|TablatureShare[]
     */
    public function getMyShares(): Collection
    {
        return $this->myShares;
    }
    
    /**
     * @return Collection|Tablature[]
     */
    public function getTargetedShares(): Collection
    {
        return $this->targetedShares;
    }
}
