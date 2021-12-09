<?php

namespace App\Repository;

use App\Entity\BookShelf;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method BookShelf|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookShelf|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookShelf[]    findAll()
 * @method BookShelf[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookShelfRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookShelf::class);
    }

    // /**
    //  * @return BookShelf[] Returns an array of BookShelf objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?BookShelf
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
