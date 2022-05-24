<?php  namespace App\Controller\WebGuitarPro\Checkout;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

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
        EntityRepository $ordersRepository,
        Payum $payum,
        string $paymentClass,
        
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCosde
    ) {
        parent::__construct( $ordersRepository, $payum, $paymentClass );
        
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
            $payment->getOrder()->setStatus( Order::STATUS_ORDER );
            $storage->update( $payment );
            return $this->render( '@VSPayment/Pages/Checkout/done.html.twig', [
                'paymentStatus' => $status,
                
                'tabForm'                   => $this->getTabForm()->createView(),
                'tabCategoryForm'           => $this->getTabCategoryForm()->createView(),
                'tabCategoriesTaxonomyId'   => $this->tabCategoriesTaxonomy->getId(),
            ]);
        }
        
        if ( $status->isFailed() || $status->isCanceled() ) {
            throw new HttpException( 400, $this->getErrorMessage( $status->getModel() ) );
        }
    }
}
