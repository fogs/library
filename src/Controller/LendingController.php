<?php

namespace App\Controller;

use App\Entity\Lending;
use App\Form\LendingType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/lending")
 */
class LendingController extends AbstractController
{
    /**
     * @Route("/", name="lending_index", methods={"GET"})
     */
    public function index(): Response
    {
        $lendings = $this->getDoctrine()
            ->getRepository(Lending::class)
            ->findAll();

        return $this->render('lending/index.html.twig', [
            'lendings' => $lendings,
        ]);
    }

    /**
     * @Route("/new", name="lending_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $lending = new Lending();
        $form = $this->createForm(LendingType::class, $lending);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lending);
            $entityManager->flush();

            return $this->redirectToRoute('lending_index');
        }

        return $this->render('lending/new.html.twig', [
            'lending' => $lending,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lending_show", methods={"GET"})
     */
    public function show(Lending $lending): Response
    {
        return $this->render('lending/show.html.twig', [
            'lending' => $lending,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="lending_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Lending $lending): Response
    {
        $form = $this->createForm(LendingType::class, $lending);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lending_index', [
                'id' => $lending->getId(),
            ]);
        }

        return $this->render('lending/edit.html.twig', [
            'lending' => $lending,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="lending_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Lending $lending): Response
    {
        if ($this->isCsrfTokenValid('delete'.$lending->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lending);
            $entityManager->flush();
        }

        return $this->redirectToRoute('lending_index');
    }
}
