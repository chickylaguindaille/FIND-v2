<?php

namespace App\Controller;

use App\Entity\Decorum;
use App\Form\DecorumType;
use App\Repository\DecorumRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/decorum')]
class DecorumController extends AbstractController
{
    #[Route('/', name: 'app_decorum_index', methods: ['GET'])]
    public function index(DecorumRepository $decorumRepository): Response
    {
        return $this->render('decorum/index.html.twig', [
            'decorums' => $decorumRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_decorum_new', methods: ['GET', 'POST'])]
    public function new(Request $request, DecorumRepository $decorumRepository): Response
    {
        $decorum = new Decorum();
        $form = $this->createForm(DecorumType::class, $decorum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $decorumRepository->save($decorum, true);

            return $this->redirectToRoute('app_decorum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('decorum/new.html.twig', [
            'decorum' => $decorum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_decorum_show', methods: ['GET'])]
    public function show(Decorum $decorum): Response
    {
        return $this->render('decorum/show.html.twig', [
            'decorum' => $decorum,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_decorum_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Decorum $decorum, DecorumRepository $decorumRepository): Response
    {
        $form = $this->createForm(DecorumType::class, $decorum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $decorumRepository->save($decorum, true);

            return $this->redirectToRoute('app_decorum_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('decorum/edit.html.twig', [
            'decorum' => $decorum,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_decorum_delete', methods: ['POST'])]
    public function delete(Request $request, Decorum $decorum, DecorumRepository $decorumRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$decorum->getId(), $request->request->get('_token'))) {
            $decorumRepository->remove($decorum, true);
        }

        return $this->redirectToRoute('app_decorum_index', [], Response::HTTP_SEE_OTHER);
    }
}
