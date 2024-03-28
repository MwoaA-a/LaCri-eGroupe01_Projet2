<?php

namespace App\Repository;

use App\Entity\EtatLots;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtatLots>
 *
 * @method EtatLots|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatLots|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatLots[]    findAll()
 * @method EtatLots[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatLotsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtatLots::class);
    }

//    /**
//     * @return EtatLots[] Returns an array of EtatLots objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EtatLots
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
