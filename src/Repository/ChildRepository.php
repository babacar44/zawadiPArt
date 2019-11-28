<?php

namespace App\Repository;

use App\Entity\Child;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Child|null find($id, $lockMode = null, $lockVersion = null)
 * @method Child|null findOneBy(array $criteria, array $orderBy = null)
 * @method Child[]    findAll()
 * @method Child[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChildRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Child::class);
    }

    // /**
    //  * @return Child[] Returns an array of Child objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Child
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */


    public function selectAll(){
        
        $conn = $this->getEntityManager()->getConnection();
    
        $sql = '
                 SELECT * FROM child
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function selectOne($id){
        
        $conn = $this->getEntityManager()->getConnection();
    
        $sql = '
                SELECT id, nom_complet, adress, telephone, photo, date_nais FROM child WHERE id= '.$id.'
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    
        // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
   
}
