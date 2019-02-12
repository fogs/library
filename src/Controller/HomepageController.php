<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;
use App\Entity\Author;
use App\Entity\Member;
use App\Entity\Lending;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {
 
     $books = $this->getDoctrine()
            ->getRepository(Book::class)
            ->findAll();
 
      
       $authors = $this->getDoctrine()
            ->getRepository(Author::class)
            ->findAll();     

        $members = $this->getDoctrine()
            ->getRepository(Member::class)
            ->findAll(); 

        $lendings = $this->getDoctrine()
            ->getRepository(Lending::class)
            ->findAll();
       

        return $this->render('homepage/index.html.twig', [
            'controller_name' => 'HomepageController',
            'booksCount' => count($books),
            'authorsCount' => count($authors),
            'membersCount' => count($members),
            'landingsCount' => count($lendings),
        ]);
    }
}
