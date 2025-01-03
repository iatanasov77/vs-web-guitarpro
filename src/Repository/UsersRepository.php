<?php namespace App\Repository;

use Vankosoft\UsersBundle\Repository\UsersRepository as BaseUsersRepository;
use Vankosoft\PaymentBundle\Model\Order;

class UsersRepository extends BaseUsersRepository
{
    public function getPaidForWhat( $user )
    {
        $entityManager  = $this->getEntityManager();
        $qb             = $entityManager->createQueryBuilder( 'ord' )
                                ->select([
                                    'MAX(ord.createdAt) AS maxDate',
                                    'obj.subscriptionPeriod AS objPeriod',
                                    'obj.id AS objId',
                                ])
                                ->from( 'App\Entity\Payment\Order', 'ord' )
                                ->groupBy( 'obj.subscriptionPeriod' )
                                ->groupBy( 'obj.id' )
                                ->leftJoin( 'ord.items', 'itm' )
                                ->leftJoin( 'itm.object', 'obj' )
                                ->andWhere( 'ord.user = :user' )->setParameter( 'user', $user )
                                ->andWhere( 'ord.status = :status' )->setParameter( 'status', ORDER::STATUS_PAID_ORDER );
                                
        
        $result         = $qb->getQuery()->getResult();
        if ( is_array( $result ) && isset( $result[0] ) ) {
            $lastPayment    = [
                'date'      => $result[0]['maxDate'],
                'period'    => $result[0]['objPeriod'],
                'objectId'  => $result[0]['objId'],
            ];
        } else {
            $lastPayment    = [];
        }
        
        return $lastPayment;
    }
}
