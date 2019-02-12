<?php


namespace App\Repository;


use App\Entity\Member;
use Doctrine\ORM\EntityRepository;

class MemberRepository extends EntityRepository
{
    public function countMembers(): int
    {
        return $this->_em->createQueryBuilder()
            ->select('count(m.id)')
            ->from(Member::class, 'm')
            ->getQuery()
            ->getSingleScalarResult();
    }
}