<?php  namespace App\Controller\WebGuitarPro\Checkout;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sylius\Component\Resource\Factory\Factory;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

use Vankosoft\PaymentBundle\Component\Payment\Payment;
use Vankosoft\PaymentBundle\Exception\ShoppingCardException;
use Vankosoft\PaymentBundle\Form\PaymentForm;

use Vankosoft\PaymentBundle\Controller\Checkout\PaymentController as BasePaymentController;
use App\Controller\WebGuitarPro\GlobalFormsTrait;

class PaymentController extends BasePaymentController
{
    use GlobalFormsTrait;
    
    /** @var TaxonomyInterface */
    private $tabCategoriesTaxonomy;
    
    public function __construct(
        Payment $vsPayment,
        Factory $ordersFactory,
        Factory $orderItemsFactory,
        EntityRepository $ordersRepository,
        EntityRepository $payableObjectsRepository,
        
        EntityRepository $taxonomyRepository,
        string $tabCategoriesTaxonomyCosde
    ) {
        parent::__construct( $vsPayment, $ordersFactory, $orderItemsFactory, $ordersRepository, $payableObjectsRepository );
        
        $this->tabCategoriesTaxonomy    = $taxonomyRepository->findByCode( $tabCategoriesTaxonomyCosde );
    }
    
    public function showCreditCardFormAction( $formAction, Request $request ): Response
    {
        $cardId = $this->get('session')->get( 'vs_payment_basket_id' );
        if ( ! $cardId ) {
            throw new ShoppingCardException( 'Card not exist in session !!!' );
        }
        $card   = $this->ordersRepository->find( $cardId );
        if ( ! $card ) {
            throw new ShoppingCardException( 'Card not exist in repository !!!' );
        }
        
        $form   = $this->getCreditCardForm( base64_decode( $formAction ) );
        
        return $this->render( '@VSPayment/Pages/CreditCard/credit_card.html.twig', [
            'form'          => $form->createView(),
            'paymentMethod' => $card->getPaymentMethod(),
            
            'tabForm'                   => $this->getTabForm()->createView(),
            'tabCategoryForm'           => $this->getTabCategoryForm()->createView(),
            'tabCategoriesTaxonomyId'   => $this->tabCategoriesTaxonomy->getId(),
        ]);
    }
}
