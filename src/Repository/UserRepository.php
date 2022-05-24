<?php namespace App\Repository;

use Vankosoft\UsersBundle\Repository\UsersRepository;
use Vankosoft\PaymentBundle\Model\Order;

class UserRepository extends UsersRepository
{
    public function getPaidForWhat( $user )
    {
        $entityManager  = $this->getEntityManager();
        $qb             = $entityManager->createQueryBuilder( 'ord' )
                                ->select(['MAX(ord.createdAt) AS maxDate', 'obj.subscriptionPeriod AS objPeriod'])
                                ->from( 'App\Entity\Payment\Order', 'ord' )
                                ->groupBy( 'obj.subscriptionPeriod' )
                                ->leftJoin( 'ord.items', 'itm' )
                                ->leftJoin( 'itm.object', 'obj' )
                                ->andWhere( 'ord.user = :user' )->setParameter( 'user', $user )
                                ->andWhere( 'ord.status = :status' )->setParameter( 'status', ORDER::STATUS_PAID_ORDER );
                                
        
        $result         = $qb->getQuery()->getResult();
        $lastPayment    = [
            'date'      => $result[0]['maxDate'],
            'period'    => $result[0]['objPeriod'],
        ];
        
        return $lastPayment;
    }
}
