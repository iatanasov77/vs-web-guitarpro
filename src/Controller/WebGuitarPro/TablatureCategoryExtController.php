<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Common\Collections\ArrayCollection;

use Vankosoft\ApplicationBundle\Repository\TaxonomyRepository;
use Vankosoft\ApplicationBundle\Controller\Traits\TaxonomyTreeDataTrait;
use Vankosoft\ApplicationBundle\Controller\Traits\CategoryTreeDataTrait;
use Vankosoft\ApplicationBundle\Component\Status;
use App\Repository\TablatureCategoryRepository;

class TablatureCategoryExtController extends AbstractController
{
    use GlobalFormsTrait;
    use TaxonomyTreeDataTrait;
    use CategoryTreeDataTrait;
    
    protected $taxonomyId;
    
    /** @var TablatureCategoryRepository */
    protected $tabsCategoriesRepository;
    
    public function __construct(
        TaxonomyRepository $taxonomyRepository,
        $taxonomyCode,
        TablatureCategoryRepository $tabsCategoriesRepository
    ) {
        $this->taxonomyRepository       = $taxonomyRepository;
        $this->taxonomyId               = $this->taxonomyRepository->findByCode( $taxonomyCode )->getId();
        $this->tabsCategoriesRepository = $tabsCategoriesRepository;
    }
    
    public function easyuiComboTree( Request $request ): Response
    {
        $data               = [];
        $user               = $this->getAppUser();
        $topCategories      = new ArrayCollection( $this->tabsCategoriesRepository->findBy( ['parent' => null, 'user' => $user] ) );
        
        $categoriesTree     = [];
        $this->getItemsTree( $topCategories, $categoriesTree );
        $this->buildEasyuiCombotreeDataFromCollection( $categoriesTree, $data, [] );
        
        return new JsonResponse( $data );
    }
}
