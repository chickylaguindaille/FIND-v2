<?php

namespace App\Controller;

use App\Entity\Anecdotes;
use App\Form\AnecdotesType;
use App\Repository\AnecdotesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/anecdotes')]
class AnecdotesController extends AbstractController
{
    #[Route('/', name: 'app_anecdotes_index', methods: ['GET'])]
    public function index(AnecdotesRepository $anecdotesRepository): Response
    {
        return $this->render('anecdotes/index.html.twig', [
            'anecdotes' => $anecdotesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_anecdotes_new', methods: ['GET', 'POST'])]
    public function new(Request $request, AnecdotesRepository $anecdotesRepository): Response
    {
        $anecdote = new Anecdotes();
        $form = $this->createForm(AnecdotesType::class, $anecdote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $anecdotesRepository->save($anecdote, true);

            return $this->redirectToRoute('app_anecdotes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('anecdotes/new.html.twig', [
            'anecdote' => $anecdote,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_anecdotes_show', methods: ['GET'])]
    public function show(Anecdotes $anecdote): Response
    {
        return $this->render('anecdotes/show.html.twig', [
            'anecdote' => $anecdote,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_anecdotes_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Anecdotes $anecdote, AnecdotesRepository $anecdotesRepository): Response
    {
        $form = $this->createForm(AnecdotesType::class, $anecdote);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $anecdotesRepository->save($anecdote, true);

            return $this->redirectToRoute('app_anecdotes_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('anecdotes/edit.html.twig', [
            'anecdote' => $anecdote,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_anecdotes_delete', methods: ['POST'])]
    public function delete(Request $request, Anecdotes $anecdote, AnecdotesRepository $anecdotesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$anecdote->getId(), $request->request->get('_token'))) {
            $anecdotesRepository->remove($anecdote, true);
        }

        return $this->redirectToRoute('app_anecdotes_index', [], Response::HTTP_SEE_OTHER);
    }
}
