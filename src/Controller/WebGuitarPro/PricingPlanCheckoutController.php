<?php namespace App\Controller\WebGuitarPro;

use Vankosoft\CatalogBundle\Controller\PricingPlanCheckoutController as BasePricingPlanCheckoutController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Component\Resource\Factory\Factory;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Vankosoft\ApplicationBundle\Component\Status;
use Vankosoft\UsersBundle\Security\SecurityBridge;
use Vankosoft\PaymentBundle\Component\OrderFactory;
use Vankosoft\PaymentBundle\Component\Payment\Payment;
use Vankosoft\PaymentBundle\Component\Exception\ShoppingCartException;
use Vankosoft\PaymentBundle\Component\Exception\CheckoutException;
use Vankosoft\PaymentBundle\Model\Interfaces\PayableObjectInterface;
use Vankosoft\CatalogBundle\Form\SelectPricingPlanForm;
use Vankosoft\CatalogBundle\Form\SelectPaymentMethodForm;
use Vankosoft\CatalogBundle\EventSubscriber\Event\CreateSubscriptionEvent;
use Vankosoft\CatalogBundle\Model\Interfaces\PricingPlanSubscriptionInterface;

class PricingPlanCheckoutController extends BasePricingPlanCheckoutController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        ManagerRegistry $doctrine,
        EventDispatcherInterface $eventDispatcher,
        SecurityBridge $securityBridge,
        Factory $ordersFactory,
        RepositoryInterface $ordersRepository,
        Factory $orderItemsFactory,
        RepositoryInterface $paymentMethodsRepository,
        Payment $vsPayment,
        OrderFactory $orderFactory,
        RepositoryInterface $gatewaysRepository,
        RepositoryInterface $pricingPlanCategoryRepository,
        RepositoryInterface $pricingPlansRepository,
        RepositoryInterface $subscriptionsRepository,
        
        RepositoryInterface $taxonomyRepository,
        string $tabCategoriesTaxonomyCode
    ) {
        parent::__construct(
            $doctrine,
            $eventDispatcher,
            $securityBridge,
            $ordersFactory,
            $ordersRepository,
            $orderItemsFactory,
            $paymentMethodsRepository,
            $vsPayment,
            $orderFactory,
            $gatewaysRepository,
            $pricingPlanCategoryRepository,
            $pricingPlansRepository,
            $subscriptionsRepository
        );
        
        $this->tabCategoriesTaxonomy            = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCode );
    }
    
    public function showPricingPlans( Request $request ): Response
    {
        $pricingPlanCategories  = $this->pricingPlanCategoryRepository->findAll();
        $activeSubscriptions    = $this->subscriptionsRepository
                                        ->getActiveSubscriptionsByUser( $this->securityBridge->getUser() );
        
        return $this->render( '@VSCatalog/Pages/PricingPlansCheckout/pricing_plans.html.twig', [
            'pricingPlanCategories' => $pricingPlanCategories,
            'subscriptions'         => $activeSubscriptions,
            
            'tabForm'                       => $this->getTabForm()->createView(),
            'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
            'tablatureUploadLimited'        => false, // ! $this->checkTablatureLimit(),
        ]);
    }
}