<?php namespace App\Repository;

use Doctrine\ORM\QueryBuilder;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class TablatureRepository extends EntityRepository
{
    public function searchTablatures( string $criteria ): QueryBuilder
    {
        $qb = $this->createQueryBuilder( 't' )
            ->orderBy( 't.updatedAt', 'DESC' )
        ;
        
        $qb
            ->andWhere( 't.artist LIKE :artist' )->setParameter( 'artist', "%{$criteria}%" )
            ->orWhere( 't.song LIKE :song' )->setParameter( 'song', "%{$criteria}%" )
        ;
        
        return $qb;
    }
}