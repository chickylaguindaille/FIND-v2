<?php

namespace App\Controller;

use App\Entity\Particularites;
use App\Form\ParticularitesType;
use App\Repository\ParticularitesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/particularites')]
class ParticularitesController extends AbstractController
{
    #[Route('/', name: 'app_particularites_index', methods: ['GET'])]
    public function index(ParticularitesRepository $particularitesRepository): Response
    {
        return $this->render('particularites/index.html.twig', [
            'particularites' => $particularitesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_particularites_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ParticularitesRepository $particularitesRepository): Response
    {
        $particularite = new Particularites();
        $form = $this->createForm(ParticularitesType::class, $particularite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $particularitesRepository->save($particularite, true);

            return $this->redirectToRoute('app_particularites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('particularites/new.html.twig', [
            'particularite' => $particularite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_particularites_show', methods: ['GET'])]
    public function show(Particularites $particularite): Response
    {
        return $this->render('particularites/show.html.twig', [
            'particularite' => $particularite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_particularites_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Particularites $particularite, ParticularitesRepository $particularitesRepository): Response
    {
        $form = $this->createForm(ParticularitesType::class, $particularite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $particularitesRepository->save($particularite, true);

            return $this->redirectToRoute('app_particularites_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('particularites/edit.html.twig', [
            'particularite' => $particularite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_particularites_delete', methods: ['POST'])]
    public function delete(Request $request, Particularites $particularite, ParticularitesRepository $particularitesRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$particularite->getId(), $request->request->get('_token'))) {
            $particularitesRepository->remove($particularite, true);
        }

        return $this->redirectToRoute('app_particularites_index', [], Response::HTTP_SEE_OTHER);
    }
}
