<?php

namespace App\Controller;

use App\Entity\Chant;
use App\Form\ChantType;
use App\Repository\ChantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/chant')]
class ChantController extends AbstractController
{
    #[Route('/', name: 'app_chant_index', methods: ['GET'])]
    public function index(ChantRepository $chantRepository): Response
    {
        return $this->render('chant/index.html.twig', [
            'chants' => $chantRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_chant_new', methods: ['GET', 'POST'])]
    public function new(Request $request, ChantRepository $chantRepository): Response
    {
        $chant = new Chant();
        $form = $this->createForm(ChantType::class, $chant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chantRepository->save($chant, true);

            return $this->redirectToRoute('app_chant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chant/new.html.twig', [
            'chant' => $chant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_chant_show', methods: ['GET'])]
    public function show(Chant $chant): Response
    {
        return $this->render('chant/show.html.twig', [
            'chant' => $chant,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_chant_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Chant $chant, ChantRepository $chantRepository): Response
    {
        $form = $this->createForm(ChantType::class, $chant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $chantRepository->save($chant, true);

            return $this->redirectToRoute('app_chant_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('chant/edit.html.twig', [
            'chant' => $chant,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_chant_delete', methods: ['POST'])]
    public function delete(Request $request, Chant $chant, ChantRepository $chantRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$chant->getId(), $request->request->get('_token'))) {
            $chantRepository->remove($chant, true);
        }

        return $this->redirectToRoute('app_chant_index', [], Response::HTTP_SEE_OTHER);
    }
}
