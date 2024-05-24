<?php namespace App\Controller\WebGuitarPro;

use Vankosoft\UsersBundle\Controller\ProfileController as BaseProfileController;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

use Vankosoft\ApplicationBundle\Model\Interfaces\TaxonomyInterface;
use Vankosoft\CmsBundle\Component\Uploader\FileUploaderInterface;
use Vankosoft\UsersBundle\Security\UserManager;
use Vankosoft\AgentBundle\Component\VankosoftAgent;
use Vankosoft\PaymentBundle\Component\Payment\Payment;

class ProfileController extends BaseProfileController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    /** @var Payment */
    private $vsPayment;
    
    /** @var RepositoryInterface */
    private $pricingPlanRepository;
    
    /** @var RepositoryInterface */
    private $pricingPlanCategoryRepository;
    
    /** @var RepositoryInterface */
    private $pricingPlanSubscriptionRepository;
    
    public function __construct(
        ManagerRegistry $doctrine,
        string $usersClass,
        UserManager $userManager,
        FactoryInterface $avatarImageFactory,
        FileUploaderInterface $imageUploader,
        VankosoftAgent $vankosoftAgent,
        
        RepositoryInterface $taxonomyRepository,
        string $tabCategoriesTaxonomyCosde,
        
        Payment $vsPayment,
        RepositoryInterface $pricingPlanRepository,
        RepositoryInterface $pricingPlanCategoryRepository,
        RepositoryInterface $pricingPlanSubscriptionRepository
    ) {
        parent::__construct( $doctrine, $usersClass, $userManager, $avatarImageFactory, $imageUploader, $vankosoftAgent );
        
        $this->tabCategoriesTaxonomy                = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCosde );
        
        $this->vsPayment                            = $vsPayment;
        $this->pricingPlanRepository                = $pricingPlanRepository;
        $this->pricingPlanCategoryRepository        = $pricingPlanCategoryRepository;
        $this->pricingPlanSubscriptionRepository    = $pricingPlanSubscriptionRepository;
    }
    
    public function indexAction( Request $request ) : Response
    {
        if ( ! $this->getUser() ) {
            return $this->redirectToRoute( 'app_home' );
        }
        
        if ( $request->isMethod( 'post' ) ) {
            return parent::indexAction( $request );
        }
        
        $activeSubscriptions    = $this->pricingPlanSubscriptionRepository->getSubscriptionsByUser( $this->getUser() );
        
        $subscriptionsRoutes    = [];
        foreach ( $activeSubscriptions as $subscription ) {
            $subscriptionsRoutes[$subscription->getId()]    = [
                'createRecurring'   => $this->vsPayment->getPaymentCreateRecurringUrl( $subscription ),
                'cancelRecurring'   => $this->vsPayment->getPaymentCancelRecurringUrl( $subscription ),
            ];
        }
        
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->doctrine->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->doctrine->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
            
            'subscriptions'                 => $activeSubscriptions,
            'subscriptionsRoutes'           => $subscriptionsRoutes,
        ];
        
        return $this->render( '@VSUsers/Profile/show.html.twig', \array_merge( $params, $this->templateParams( $this->getProfileEditForm() ) ) );
    }
    
    public function editAction( Request $request ): Response
    {
        $params = [
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'locales'                       => $this->doctrine->getRepository( 'App\Entity\Application\Locale' )->findAll(),
            'paidTablatureStoreServices'    => $this->doctrine->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            
            'tablatureUploadLimited'        => ! $this->checkTablatureLimit(),
            
            //'subscriptions'                 => $activeSubscriptions,
            //'subscriptionsRoutes'           => $subscriptionsRoutes,
        ];
        
        return $this->render( '@VSUsers/Profile/edit.html.twig', \array_merge( $params, $this->templateParams( $this->getProfileEditForm() ) ) );
    }
}
