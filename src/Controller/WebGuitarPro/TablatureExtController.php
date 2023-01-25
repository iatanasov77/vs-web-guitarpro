<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\ApplicationBundle\Repository\TaxonomyRepository;
use Vankosoft\ApplicationBundle\Repository\TaxonRepository;
use Vankosoft\ApplicationBundle\Controller\TaxonomyTreeDataTrait;

use App\Security\Helper as AppSecurityHelper;

class TablatureExtController extends AbstractController
{
    use GlobalFormsTrait;
    use TaxonomyTreeDataTrait;
    
    /** @var AppSecurityHelper */
    protected AppSecurityHelper $appSecurityHelper;
    
    /** @var EntityRepository */
    protected EntityRepository $tabsRepository;
    
    /** @var string */
    protected string $tabsDirectory;
    
    public function __construct(
        ManagerRegistry $doctrine,
        TaxonomyRepository $taxonomyRepository,
        EntityRepository $taxonRepository,
        AppSecurityHelper $appSecurityHelper,
        EntityRepository $tabsRepository,
        string $tabsDirectory
    ) {
        $this->doctrine             = $doctrine;
        $this->taxonomyRepository   = $taxonomyRepository;
        $this->taxonRepository      = $taxonRepository;
        $this->appSecurityHelper    = $appSecurityHelper;
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
        
        // open the file in a binary mode
        return new BinaryFileResponse( $fileTablature, 200, ["Content-Type" => "audio/x-guitar-pro"] );
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
        $token  = $this->appSecurityHelper->getTokenStorage()->getToken();
        $taxons = [];
        
        if ( $token ) {
            $categories = $token->getUser()->getTabCategories();
            foreach( $categories as $cat ) {
                $taxon  = $cat->getTaxon();
                $taxon->setCurrentLocale( $locale );
                
                $taxons[] = $taxon;
            }
        }
        
        return $taxons;
    }
}
