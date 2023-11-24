<?php

namespace App\Repository;

use App\Entity\ContactArea;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContactArea>
 *
 * @method ContactArea|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContactArea|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContactArea[]    findAll()
 * @method ContactArea[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactAreaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContactArea::class);
    }

//    /**
//     * @return ContactArea[] Returns an array of ContactArea objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ContactArea
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
