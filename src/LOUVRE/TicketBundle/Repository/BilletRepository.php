<?php

namespace LOUVRE\TicketBundle\Repository;

/**
 * BilletRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BilletRepository extends \Doctrine\ORM\EntityRepository
{

    /*public function getDateVisitors($datedevisite)
    {
    $qb=$this->createQueryBuilder('b')
    ->leftJoin('b.visiteurs', 'vi')
    ->addSelect('vi');

    $qb->where('b.datedevisite= :datedevisite')
    ->setParameter('datedevisite', $datedevisite);



    return $qb->getQuery()->getResult();


    }*/

    /*public function getNumberVisitors(array $billet_id)
    {
    $qb=$this->createQueryBuilder('v')
    ->leftJoin('v.visiteurs', 'vi')
    ->addSelect('vi');

    $qb->where($qb->expr()->in('vi.billet_id', $billet_id));

    return $qb->getQuery()->getResult();

    }*/



    
}
