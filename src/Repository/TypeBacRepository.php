<?php

namespace App\Repository;

use App\Entity\TypeBac;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeBac>
 *
 * @method TypeBac|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeBac|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeBac[]    findAll()
 * @method TypeBac[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeBacRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeBac::class);
    }

//    /**
//     * @return TypeBac[] Returns an array of TypeBac objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeBac
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
