<?php namespace App\Controller\WebGuitarPro;

use App\Entity\Tablature;
use App\Entity\TablatureCategory;
use App\Form\TablatureForm;
use App\Form\TablatureCategoryForm;

trait GlobalFormsTrait
{
    protected function getTabForm()
    {
        return $this->createForm( TablatureForm::class, new Tablature() );
    }
    
    protected function getTabCategoryForm()
    {
        return $this->createForm( TablatureCategoryForm::class, new TablatureCategory() );
    }
}
