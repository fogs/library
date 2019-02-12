<?php


namespace App\Repository;


use App\Entity\Book;
use Doctrine\ORM\EntityRepository;

class BookRepository extends EntityRepository
{
    public function countBooks(): int
    {
        return $this->_em->createQueryBuilder()
            ->select('count(b.id)')
            ->from(Book::class, 'b')
            ->getQuery()
            ->getSingleScalarResult();
    }
}