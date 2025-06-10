<?php namespace App\Entity\Application;

use Doctrine\ORM\Mapping as ORM;
use Vankosoft\ApplicationBundle\Model\Application as BaseApplication;
use App\Entity\GamePlatformApplication;

/**
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation( "ORM\MappedSuperclass" )
 * @Doctrine\Common\Annotations\Annotation\IgnoreAnnotation("ORM\Column")
 */
#[ORM\Entity]
#[ORM\Table(name: "VSAPP_Applications")]
class Application extends BaseApplication
{
    /** @var GamePlatformApplication */
    #[ORM\OneToOne(targetEntity: GamePlatformApplication::class, mappedBy: "application")]
    private $gamePlatformApplication;
    
    public function getGamePlatformApplication()
    {
        return $this->gamePlatformApplication;
    }
    
    public function setGamePlatformApplication($gamePlatformApplication)
    {
        $this->gamePlatformApplication  = $gamePlatformApplication;
        
        return $this;
    }
}
