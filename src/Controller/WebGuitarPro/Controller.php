<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Tablature;
use App\Form\TablatureForm;

class Controller extends AbstractController
{
    protected function getTabForm()
    {
        return $this->createForm( TablatureForm::class, new Tablature() );
    }
}
