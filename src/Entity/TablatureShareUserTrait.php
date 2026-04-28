<?php namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

trait TablatureShareUserTrait
{
    #[ORM\OneToMany(targetEntity: TablatureShare::class, mappedBy: "owner", indexBy: "id", cascade: ["all"])]
    protected $myShares;
    
    #[ORM\ManyToMany(targetEntity: TablatureShare::class, mappedBy: "targetUsers", indexBy: "id")]
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
