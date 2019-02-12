<?php


namespace App\Repository;


use App\Entity\Lending;
use Doctrine\ORM\EntityRepository;

class LendingRepository extends EntityRepository
{
    public function countLending(): int
    {
        return $this->_em->createQueryBuilder()
            ->select('count(l.id)')
            ->from(Lending::class, 'l')
            ->getQuery()
            ->getSingleScalarResult();
    }
}