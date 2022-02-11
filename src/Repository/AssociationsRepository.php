<?php

namespace App\Repository;

use App\Entity\Associations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Associations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Associations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Associations[]    findAll()
 * @method Associations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssociationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Associations::class);
    }

    // /**
    //  * @return Associations[] Returns an array of Associations objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function findAssociationByUser($user)
    {
        return $this->createQueryBuilder('associations')
            ->andWhere(':user MEMBER OF associations.users')
            ->setParameter('user', $user->getId())
            ->getQuery()
            ->getResult()
        ;
    }
    





    
    public function findAll()
    {
        return $this->createQueryBuilder('associations')
            ->getQuery()
            ->getResult();
    }
    
    public function assoc12()
    {
        return $this->createQueryBuilder('associations')
            ->where('associations.id = 12')
            ->getQuery()
            ->getResult();
    }
}
