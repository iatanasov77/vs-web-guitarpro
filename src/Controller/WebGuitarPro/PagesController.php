<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Vankosoft\ApplicationBundle\Model\Interfaces\TaxonomyInterface;

use App\Entity\Cms\Page;

class PagesController extends AbstractController
{
    use GlobalFormsTrait;
    
    /** @var ManagerRegistry **/
    private $doctrine;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        ManagerRegistry $doctrine,
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCosde
    ) {
        $this->doctrine                 = $doctrine;
        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCosde );
    }
    
    public function aboutApplication( Request $request ): Response
    {
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
            'pageAbout'                     => $this->doctrine->getRepository( Page::class )->findBySlug( 'about-application' ),
        ];
        return $this->render( 'Pages/Pages/about_application.html.twig', $params );
    }
    
    public function downloadStoreApplication( Request $request ): Response
    {
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
            'pageDownloadStoreApp'                     => $this->doctrine->getRepository( Page::class )->findBySlug( 'download-store-application' ),
        ];
        return $this->render( 'Pages/Pages/download_store_application.html.twig', $params );
    }
}
