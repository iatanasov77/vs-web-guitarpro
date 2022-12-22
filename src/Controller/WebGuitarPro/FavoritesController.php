<?php namespace App\Controller\WebGuitarPro;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class FavoritesController extends AbstractController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        ManagerRegistry $doctrine,
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCode
    ) {
        $this->doctrine                 = $doctrine;
        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCode );
    }
    
    public function index( Request $request ): Response
    {
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->doctrine->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->doctrine->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
        ];
        
        return $this->render( 'Pages/Dashboard/favorites.html.twig', $params );
    }
    
    public function addFavorite( $id, Request $request ): Response
    {
        $em             = $this->doctrine->getManager();
        $er             = $this->doctrine->getRepository( 'App\Entity\Tablature' );
        
        $oTablature     = $er->find( $request->attributes->get( 'id' ) );
        $oUser          = $this->getUser();
        
        $oUser->addFavorite( $oTablature );
        $em->persist( $oUser );
        $em->flush();
        
        return new JsonResponse( 'Success' );
    }
}
