<?php namespace App\Security;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class Helper
{
    private TokenStorageInterface $tokenStorage;
    
    public function __construct( TokenStorageInterface $tokenStorage )
    {
        $this->tokenStorage = $tokenStorage;
    }
    
    public function getTokenStorage()
    {
        return $this->tokenStorage;
    }
}