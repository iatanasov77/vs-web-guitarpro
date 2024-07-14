<?php namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

use App\Entity\Tablature;

class MyTablaturesController extends AbstractController
{
    /** @var TokenStorageInterface */
    private $tokenStorage;
    
    public function __construct( TokenStorageInterface $tokenStorage )
    {
        $this->tokenStorage = $tokenStorage;
    }
    
    public function __invoke(): iterable
    {
        $user   = $this->tokenStorage->getToken()->getUser();
        
        return $user->getTablatures();
    }
}
