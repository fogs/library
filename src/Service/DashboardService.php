<?php 

namespace App\Service;

use Doctrine\Common\Persistence\ManagerRegistry;

class DashboardService {

    /** ManagerRegistry $doctrine */
    private $doctrine;

    /** EntityManager $em */
    private $em;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
        $this->em = $this->doctrine->getEntityManager();
    }

    public function getCountOfBooks() {
        $query = $this->em->createQuery("SELECT COUNT(b) FROM App\Entity\Book b");
        $numberOfBooks = $query->getSingleScalarResult();
        return $numberOfBooks;
    }

    public function getCountOfAuthors() {
        $query = $this->em->createQuery("SELECT COUNT(a) FROM App\Entity\Author a");
        $numberOfAuthors = $query->getSingleScalarResult();
        return $numberOfAuthors;
    }

    public function getCountOfMembers() {
        $query = $this->em->createQuery("SELECT COUNT(m) FROM App\Entity\Member m");
        $numberOfMembers = $query->getSingleScalarResult();
        return $numberOfMembers;
    }

    public function getCountOfLendings() {
        $query = $this->em->createQuery("SELECT COUNT(l) FROM App\Entity\Lending l");
        $numberOfLendings = $query->getSingleScalarResult();
        return $numberOfLendings;
    }

}