<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class ErrorController extends AbstractController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCosde
    ) {
        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCosde );
    }
    
    public function uploadTablaturesLimited( Request $request ): Response
    {
        return $this->render( 'Pages/Error/upload-tablatures-limited.html.twig', [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->getDoctrine()->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->getDoctrine()->getRepository( 'App\Entity\UsersSubscriptions\PayedService' )->findAll(),
        ]);
    }
}
