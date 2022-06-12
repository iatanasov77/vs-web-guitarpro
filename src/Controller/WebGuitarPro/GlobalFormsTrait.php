<?php namespace App\Controller\WebGuitarPro;

use Vankosoft\UsersSubscriptionsBundle\Component\PayedService\SubscriptionPeriod;

use App\Entity\Tablature;
use App\Entity\TablatureCategory;
use App\Form\TablatureForm;
use App\Form\TablatureCategoryForm;

trait GlobalFormsTrait
{
    protected function getTabForm()
    {
        return $this->createForm( TablatureForm::class, new Tablature() );
    }
    
    protected function getTabCategoryForm()
    {
        return $this->createForm( TablatureCategoryForm::class, new TablatureCategory() );
    }
    
    /**
     * TRUE for NoLimit, FALSE For Limited
     *
     * @return boolean
     */
    protected function checkTablatureLimit()
    {
        $tablatureLimit = -1;
        $paid           = true;
        if ( $this->getUser()->getUsername() != 'admin' ) {
            $tablatureLimit = $this->getParameter( 'vs_wgp.unpaid_tablature_storage' );
            
            $lastPayment    = $this->getDoctrine()
                                    ->getRepository( 'App\Entity\UserManagement\User' )
                                    ->getPaidForWhat( $this->getUser() );
            if ( ! empty( $lastPayment ) ) {
                $paidService    = $this->getDoctrine()
                                        ->getRepository( 'App\Entity\UsersSubscriptions\PayedServiceSubscriptionPeriod' )
                                        ->find( $lastPayment['objectId'] )
                                        ->getPayedService();
                
                switch ( $lastPayment['period'] ) {
                    case SubscriptionPeriod::SUBSCRIPTION_PERIOD_YEAR:
                        $paid   = ( ( new \DateTime( $lastPayment['date'] ) )->add( new \DateInterval( 'P1Y' ) ) ) > ( new \DateTime() );
                        if ( $paid ) {
                            $tablatureLimit = (int)$paidService->getAttribute( 'tablature_storage' )->getValue();
                        }
                        break;
                    case SubscriptionPeriod::SUBSCRIPTION_PERIOD_MONTH:
                        $paid   = ( ( new \DateTime( $lastPayment['date'] ) )->add( new \DateInterval( 'P1M' ) ) ) > ( new \DateTime() );
                        if ( $paid ) {
                            $tablatureLimit = (int)$paidService->getAttribute( 'tablature_storage' )->getValue();
                        }
                        break;
                    default:
                        $paid   = false;
                }
            }
        }
        
        return ( $tablatureLimit < 0 || $paid ) || ( $this->getUser()->getTablatures()->count() < $tablatureLimit );
    }
}
