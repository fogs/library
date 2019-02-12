<?php

namespace App\Controller;

use App\Entity\Author;
use App\Entity\Book;
use App\Entity\Lending;
use App\Entity\Member;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     *
     * @param EntityManagerInterface $em
     * @return Response
     */
    public function index(EntityManagerInterface $em): Response
    {
        return $this->render('homepage/index.html.twig', [
            'books' => $em->getRepository(Book::class)->countBooks(),
            'members' => $em->getRepository(Member::class)->countMembers(),
            'authors' => $em->getRepository(Author::class)->countAuthors(),
            'lending' => $em->getRepository(Lending::class)->countLending(),
        ]);
    }
}
