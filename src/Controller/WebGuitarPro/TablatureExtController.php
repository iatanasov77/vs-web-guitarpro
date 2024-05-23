<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\ArrayCollection;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\ApplicationBundle\Repository\TaxonomyRepository;
use Vankosoft\ApplicationBundle\Repository\TaxonRepository;
use Vankosoft\ApplicationBundle\Controller\Traits\TaxonomyTreeDataTrait;
use Vankosoft\ApplicationBundle\Controller\Traits\CategoryTreeDataTrait;
use Vankosoft\UsersBundle\Security\SecurityBridge;
use App\Repository\TablatureCategoryRepository;

class TablatureExtController extends AbstractController
{
    use GlobalFormsTrait;
    use TaxonomyTreeDataTrait;
    use CategoryTreeDataTrait;
    
    /** @var ParameterBagInterface */
    protected $params;
    
    /** @var SecurityBridge */
    protected $securityBridge;
    
    /** @var EntityRepository */
    protected $tabsRepository;
    
    /** @var TablatureCategoryRepository */
    protected $tabsCategoriesRepository;
    
    /** @var string */
    protected $tabsDirectory;
    
    public function __construct(
        ParameterBagInterface $params,
        ManagerRegistry $doctrine,
        TaxonomyRepository $taxonomyRepository,
        TaxonRepository $taxonRepository,
        SecurityBridge $securityBridge,
        EntityRepository $tabsRepository,
        TablatureCategoryRepository $tabsCategoriesRepository,
        string $tabsDirectory
    ) {
        $this->params                   = $params;
        $this->doctrine                 = $doctrine;
        $this->taxonomyRepository       = $taxonomyRepository;
        $this->taxonRepository          = $taxonRepository;
        $this->securityBridge           = $securityBridge;
        $this->tabsRepository           = $tabsRepository;
        $this->tabsCategoriesRepository = $tabsCategoriesRepository;
        $this->tabsDirectory            = $tabsDirectory;
    }
    
    public function show( Request $request ): Response
    {
        $id = $request->attributes->get( 'id' );
        if ( is_numeric( $id ) ) {
            $oTablature     = $this->tabsRepository->find( $id );
        } else {
            $oTablature     = $this->tabsRepository->findOneBy( ['slug' => $id] );
        }
        
        if ( ! $this->checkHasAccess( $oTablature ) ) {
            return $this->redirectToRoute( 'wgp_access_denied' );
        }
        
        return $this->render( 'Pages/Player/show.html.twig', [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'item'                          => $oTablature,
            'error'                         => false,
            'tabCategoriesTaxonomyId'       => $this->getTabCategoriesTaxonomy()->getId(),
            
            'tablatureUploadLimited'        => false, // ! $this->checkTablatureLimit(),
            'baseUrl'                       => $this->params->get( 'vankosoft_host' ),
        ]);
    }
    
    /**
     * Read a tablature file from storage dir
     *
     * examples: https://ourcodeworld.com/articles/read/329/how-to-send-a-file-as-response-from-a-controller-in-symfony-3
     */
    public function read( $id, Request $request ): Response
    {
        $oTablature     = $this->tabsRepository->find( $request->attributes->get( 'id' ) );
        
        if ( ! $this->checkHasAccess( $oTablature ) ) {
            return $this->redirectToRoute( 'wgp_access_denied' );
        }
        
        $fileTablature  = $this->tabsDirectory . '/' . $oTablature->getTablatureFile()->getPath();
        
        $response       = new BinaryFileResponse( $fileTablature, 200, ["Content-Type" => "audio/x-guitar-pro"] );
        $response->setContentDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            $oTablature->getTablatureFile()->getOriginalName()
        );
        
        // open the file in a binary mode
        return $response;
    }
    
    public function easyuiComboTreeWithSelectedSource( $categoriesTaxonomyId, $tabId, Request $request ): Response
    {
        $editTab            = $tabId ? $this->tabsRepository->find( $tabId ) : null;
        $selectedCategories = $editTab  ? $editTab->getCategories()->toArray() : [];
        $data               = [];
        
        $user               = $this->getAppUser();
        $topCategories      = new ArrayCollection( $this->tabsCategoriesRepository->findBy( ['parent' => null, 'user' => $user] ) );
        
        $categoriesTree     = [];
        $this->getItemsTree( $topCategories, $categoriesTree );
        $this->buildEasyuiCombotreeDataFromCollection( $categoriesTree, $data, $selectedCategories );
        
        return new JsonResponse( $data );
    }
    
    protected function getSelectedCategoryTaxons( $tabId ): array
    {
        $selected   = [];
        $tab       = $this->tabsRepository->find( $tabId );
        if ( $tab ) {
            foreach( $tab->getCategories() as $cat ) {
                $selected[] = $cat->getTaxon()->getId();
            }
        }
        
        return $selected;
    }
    
    protected function getUserCategoriesTaxons( string $locale ): array
    {
        $taxons = [];
        
        if ( $this->securityBridge->getUser() ) {
            $categories = $this->securityBridge->getUser()->getTabCategories();
            foreach( $categories as $cat ) {
                $taxon  = $cat->getTaxon();
                $taxon->setCurrentLocale( $locale );
                
                $taxons[] = $taxon;
            }
        }
        
        return $taxons;
    }
    
    private function getTabCategoriesTaxonomy()
    {
        $taxonomy   = $this->taxonomyRepository->findByCode( 'tablature-categories' );
        
        return $taxonomy;
    }
}
