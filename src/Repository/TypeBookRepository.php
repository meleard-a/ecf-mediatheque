<?php

namespace App\Repository;

use App\Entity\TypeBook;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeBook|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeBook|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeBook[]    findAll()
 * @method TypeBook[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeBookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeBook::class);
    }

    // /**
    //  * @return TypeBook[] Returns an array of TypeBook objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeBook
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
