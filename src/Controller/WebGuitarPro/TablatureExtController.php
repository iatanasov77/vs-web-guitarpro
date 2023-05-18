<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\ApplicationBundle\Repository\TaxonomyRepository;
use Vankosoft\ApplicationBundle\Repository\TaxonRepository;
use Vankosoft\ApplicationBundle\Controller\TaxonomyTreeDataTrait;
use Vankosoft\UsersBundle\Security\SecurityBridge;

class TablatureExtController extends AbstractController
{
    use GlobalFormsTrait;
    use TaxonomyTreeDataTrait;
    
    /** @var SecurityBridge */
    protected SecurityBridge $securityBridge;
    
    /** @var EntityRepository */
    protected EntityRepository $tabsRepository;
    
    /** @var string */
    protected string $tabsDirectory;
    
    public function __construct(
        ManagerRegistry $doctrine,
        TaxonomyRepository $taxonomyRepository,
        EntityRepository $taxonRepository,
        SecurityBridge $securityBridge,
        EntityRepository $tabsRepository,
        string $tabsDirectory
    ) {
        $this->doctrine             = $doctrine;
        $this->taxonomyRepository   = $taxonomyRepository;
        $this->taxonRepository      = $taxonRepository;
        $this->securityBridge       = $securityBridge;
        $this->tabsRepository       = $tabsRepository;
        $this->tabsDirectory        = $tabsDirectory;
    }
    
    /**
     * Read a tablature file from storage dir
     *
     * examples: https://ourcodeworld.com/articles/read/329/how-to-send-a-file-as-response-from-a-controller-in-symfony-3
     */
    public function read( $id, Request $request ): Response
    {
        $er             = $this->doctrine->getRepository( 'App\Entity\Tablature' );
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );
        
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
        return new JsonResponse(
            $this->easyuiComboTreeDataProvideTaxons(
                $this->getUserCategoriesTaxons( $request->getLocale() ),
                $this->getSelectedCategoryTaxons( $tabId )
            )
        );
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
}
