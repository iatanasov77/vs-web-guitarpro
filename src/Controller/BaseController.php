<?php namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Form\TablatureType;

class BaseController extends AbstractController
{
    protected function _tabForm( $entity )
    {
        return $this->createForm( TablatureType::class, $entity );
    }
}
