<?php namespace App\Controller\WebGuitarPro;

use Symfony\Component\Security\Core\User\UserInterface;
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
        //return true;    // Work-Around
        $user   = $this->getAppUser();
        if ( ! $user ) {
            return false;
        }
        
        if ( $user->hasRole( 'ROLE_SUPER_ADMIN' ) || $user->hasRole( 'ROLE_ADMIN' ) || $user->hasRole( 'ROLE_APPLICATION_ADMIN' ) ) {
            return true;
        }
        
        $tablatureLimit = $this->getParameter( 'vs_wgp.unpaid_tablature_storage' );
        $paid           = false;
        
        $lastPayment    = false;
//         $lastPayment    = $this->_getDoctrine()
//                                 ->getRepository( 'App\Entity\UserManagement\User' )
//                                 ->getPaidForWhat( $this->getAppUser() );
        
        if ( ! empty( $lastPayment ) ) {
            $paidService    = $this->_getDoctrine()
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
        
        return ( $tablatureLimit < 0 || $paid ) || ( $this->getAppUser()->getTablatures()->count() < $tablatureLimit );
    }
    
    protected function checkHasAccess( Tablature $tablature ): bool
    {
        //return true;    // Work-Around
        
        $hasAccess  = $tablature->isPublic() || $tablature->getUser() == $this->getAppUser();
        if ( $hasAccess ) {
            return  true;
        }
        
        if ( $this->getAppUser() ) {
            foreach ( $this->getAppUser()->getTargetedShares() as $share ) {
                if ( $share->getTablatures()->contains( $tablature ) ) {
                    return true;
                }
            }
        }
        
        return false;
    }
    
    protected function getAppUser():? UserInterface
    {
        if ( $this->container->has( 'vs_users.security_bridge' ) ) {
            return $this->container->get( 'vs_users.security_bridge' )->getUser();
        }

        return $this->getUser();
    }
    
    protected function _getDoctrine()
    {
        if ( \method_exists( $this, 'getDoctrine' ) ) {
            return $this->getDoctrine();
        } else {
            return $this->doctrine;
        }
    }
}
