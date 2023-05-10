<?php  namespace App\Controller\WebGuitarPro\Checkout;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Doctrine\Persistence\ManagerRegistry;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Sylius\Component\Resource\Factory\Factory;

use Payum\Core\Payum;
use Payum\Core\Request\GetHumanStatus;
use Payum\Core\Model\CreditCard;

use Vankosoft\PaymentBundle\Model\Order;
use Vankosoft\PaymentBundle\Exception\ShoppingCardException;

use Vankosoft\PaymentBundle\Controller\Checkout\StripeCheckoutController as BaseStripeCheckoutController;
use App\Controller\WebGuitarPro\GlobalFormsTrait;

class StripeCheckoutController extends BaseStripeCheckoutController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        ManagerRegistry $doctrine,
        EntityRepository $ordersRepository,
        Payum $payum,
        string $paymentClass,
        EntityRepository $subscriptionRepository,
        Factory $subscriptionFactory,
        
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCosde
    ) {
        parent::__construct( $doctrine, $ordersRepository, $payum, $paymentClass, $subscriptionRepository, $subscriptionFactory );
        
        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCosde );
    }
    
    public function doneAction( Request $request ): Response
    {
        $token      = $this->payum->getHttpRequestVerifier()->verify( $request );
        $this->payum->getHttpRequestVerifier()->invalidate( $token );  // you can invalidate the token. The url could not be requested any more.
        
        $gateway    = $this->payum->getGateway( $token->getGatewayName() );
        $gateway->execute( $status = new GetHumanStatus( $token ) );
        
        $storage    = $this->payum->getStorage( $this->paymentClass );
        $payment    = $status->getFirstModel();
        
        if ( $status->isCaptured() || $status->isAuthorized() || $status->isPending() ) {
            // success
            $payment->getOrder()->setStatus( Order::STATUS_PAID_ORDER );
            $storage->update( $payment );
            $this->get( 'session' )->remove( 'vs_payment_basket_id' );
            
            $this->setSubscription( $payment->getOrder() );
            
            return $this->render( '@VSPayment/Pages/Checkout/done.html.twig', [
                'paymentStatus' => $status,
                
                'tabForm'                       => $this->getTabForm()->createView(),
                'tabCategoryForm'               => $this->getTabCategoryForm()->createView(),
                'tabCategoriesTaxonomyId'       => $this->tabCategoriesTaxonomy->getId(),
                
                'locales'                       => $this->doctrine->getRepository( 'App\Entity\Application\Locale' )->findAll(),
                'paidTablatureStoreServices'    => $this->doctrine->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )->findAll(),
            ]);
        }
        
        if ( $status->isFailed() || $status->isCanceled() ) {
            $payment->getOrder()->setStatus( Order::STATUS_FAILED_ORDER );
            $storage->update( $payment );
            $this->get( 'session' )->remove( 'vs_payment_basket_id' );
            
            throw new HttpException( 400, $this->getErrorMessage( $status->getModel() ) );
        }
    }
}
