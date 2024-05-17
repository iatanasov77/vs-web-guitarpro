<?php namespace App\Controller\WebGuitarPro;

use Vankosoft\UsersBundle\Controller\ProfileController as BaseProfileController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\ApplicationBundle\Model\Interfaces\TaxonomyInterface;
use Vankosoft\CmsBundle\Component\Uploader\FileUploaderInterface;
use Vankosoft\UsersBundle\Security\UserManager;
use Vankosoft\AgentBundle\Component\VankosoftAgent;

class ProfileController extends BaseProfileController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        ManagerRegistry $doctrine,
        string $usersClass,
        UserManager $userManager,
        FactoryInterface $avatarImageFactory,
        FileUploaderInterface $imageUploader,
        VankosoftAgent $vankosoftAgent,
        
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCosde
    ) {
        parent::__construct( $doctrine, $usersClass, $userManager, $avatarImageFactory, $imageUploader, $vankosoftAgent );
        
        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCosde );
    }
    
    public function indexAction( Request $request ) : Response
    {
        if ( ! $this->getUser() ) {
            return $this->redirectToRoute( 'app_home' );
        }
        
        if ( $request->isMethod( 'post' ) ) {
            return parent::indexAction( $request );
        }
        
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->doctrine->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->doctrine->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
        ];
        
        return $this->render( '@VSUsers/Profile/show.html.twig', array_merge( $params, $this->templateParams( $this->getProfileEditForm() ) ) );
    }
}
