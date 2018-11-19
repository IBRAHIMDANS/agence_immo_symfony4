<?php

namespace App\Repository;

use App\Entity\UserBDD;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserBDD|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserBDD|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserBDD[]    findAll()
 * @method UserBDD[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserBDDRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserBDD::class);
    }

    // /**
    //  * @return UserBDD[] Returns an array of UserBDD objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserBDD
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
