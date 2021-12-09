<?php

namespace App\Controller;

use App\Entity\BookShelf;
use App\Form\BookShelfType;
use App\Repository\BookShelfRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bookshelf")
 */
class BookShelfController extends AbstractController
{
    /**
     * @Route("/", name="book_shelf_index", methods={"GET"})
     */
    public function index(BookShelfRepository $bookShelfRepository): Response
    {
        return $this->render('book_shelf/index.html.twig', [
            'book_shelves' => $bookShelfRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="book_shelf_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $bookShelf = new BookShelf();
        $form = $this->createForm(BookShelfType::class, $bookShelf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($bookShelf);
            $entityManager->flush();

            return $this->redirectToRoute('book_shelf_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('book_shelf/new.html.twig', [
            'book_shelf' => $bookShelf,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="book_shelf_show", methods={"GET"})
     */
    public function show(BookShelf $bookShelf): Response
    {
        return $this->render('book_shelf/show.html.twig', [
            'book_shelf' => $bookShelf,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="book_shelf_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, BookShelf $bookShelf, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BookShelfType::class, $bookShelf);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('book_shelf_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('book_shelf/edit.html.twig', [
            'book_shelf' => $bookShelf,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="book_shelf_delete", methods={"POST"})
     */
    public function delete(Request $request, BookShelf $bookShelf, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bookShelf->getId(), $request->request->get('_token'))) {
            $entityManager->remove($bookShelf);
            $entityManager->flush();
        }

        return $this->redirectToRoute('book_shelf_index', [], Response::HTTP_SEE_OTHER);
    }
}
