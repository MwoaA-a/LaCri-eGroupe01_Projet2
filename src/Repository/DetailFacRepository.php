<?php

namespace App\Repository;

use App\Entity\DetailFac;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DetailFac>
 *
 * @method DetailFac|null find($id, $lockMode = null, $lockVersion = null)
 * @method DetailFac|null findOneBy(array $criteria, array $orderBy = null)
 * @method DetailFac[]    findAll()
 * @method DetailFac[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DetailFacRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DetailFac::class);
    }

//    /**
//     * @return DetailFac[] Returns an array of DetailFac objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?DetailFac
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
