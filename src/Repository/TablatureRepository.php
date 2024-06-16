<?php namespace App\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use App\Entity\UserManagement\User;

class TablatureRepository extends EntityRepository
{
    public function searchTablatures( string $criteria, ?User $user ): QueryBuilder
    {
        $qb = $this->createQueryBuilder( 't' )
            ->orderBy( 't.updatedAt', 'DESC' )
        ;
        
        $qb
            ->andWhere( 't.artist LIKE :artist OR t.song LIKE :song' )
            ->setParameter( 'artist', "%{$criteria}%" )
            ->setParameter( 'song', "%{$criteria}%" )
        ;
            
        if ( $user ) {
            $qb
                ->andWhere( 't.user = :user OR t.enabled = :enabled' )
                ->setParameter( 'user', $user )
                ->setParameter( 'enabled', true )
            ;
        } else {
            $qb
                ->andWhere( 't.enabled = :enabled' )->setParameter( 'enabled', true )
            ;
        }
         
        return $qb;
    }
}