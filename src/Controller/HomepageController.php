<?php

namespace App\Controller;

use App\Service\DashboardService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    private $dashboardService;

    public function __construct(DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        $countOfBooks = $this->dashboardService->getCountOfBooks();
        $countOfAuthors = $this->dashboardService->getCountOfAuthors();
        $countOfMembers = $this->dashboardService->getCountOfMembers();
        $countOfLendings = $this->dashboardService->getCountOfLendings();

        return $this->render('homepage/index.html.twig', [
            'books_count' => $countOfBooks,
            'authors_count' => $countOfAuthors,
            'members_count' => $countOfMembers,
            'lendings_count' => $countOfLendings,
        ]);
    }
}
