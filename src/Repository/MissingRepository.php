<?php

namespace App\Repository;

use App\Entity\Missing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Missing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Missing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Missing[]    findAll()
 * @method Missing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MissingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Missing::class);
    }

    // /**
    //  * @return Missing[] Returns an array of Missing objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Missing
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
