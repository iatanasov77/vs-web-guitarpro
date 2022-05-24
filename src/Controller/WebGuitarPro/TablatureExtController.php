<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\ApplicationBundle\Repository\TaxonomyRepository;
use Vankosoft\ApplicationBundle\Repository\TaxonRepository;
use Vankosoft\ApplicationBundle\Controller\TaxonomyTreeDataTrait;

class TablatureExtController extends AbstractController
{
    use GlobalFormsTrait;
    use TaxonomyTreeDataTrait;
    
    /** @var EntityRepository */
    protected EntityRepository $tabsRepository;
    
    /** @var string */
    protected string $tabsDirectory;
    
    public function __construct(
        TaxonomyRepository $taxonomyRepository,
        TaxonRepository $taxonRepository,
        EntityRepository $tabsRepository,
        string $tabsDirectory
    ) {
        $this->taxonomyRepository   = $taxonomyRepository;
        $this->taxonRepository      = $taxonRepository;
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
        $er             = $this->getDoctrine()->getRepository( 'App\Entity\Tablature' );
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );
        $fileTablature  = $this->tabsDirectory . '/' . $oTablature->getTablatureFile()->getPath();
        
        // open the file in a binary mode
        return new BinaryFileResponse( $fileTablature, 200, ["Content-Type" => "audio/x-guitar-pro"] );
    }
    
    public function easyuiComboTreeWithSelectedSource( $categoriesTaxonomyId, $tabId, Request $request ): Response
    {
        return new JsonResponse( $this->easyuiComboTreeData( $categoriesTaxonomyId, $this->getSelectedCategoryTaxons( $tabId ) ) );
    }
    
    protected function getSelectedCategoryTaxons( $tabId ): array
    {
        $selected   = [];
        $page       = $this->tabsRepository->find( $tabId );
        if ( $page ) {
            foreach( $page->getCategories() as $cat ) {
                $selected[] = $cat->getTaxon()->getId();
            }
        }
        
        return $selected;
    }
}
