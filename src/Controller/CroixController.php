<?php

namespace App\Controller;

use App\Entity\Croix;
use App\Form\CroixType;
use App\Repository\CroixRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/croix')]
class CroixController extends AbstractController
{
    #[Route('/', name: 'app_croix_index', methods: ['GET'])]
    public function index(CroixRepository $croixRepository): Response
    {
        return $this->render('croix/index.html.twig', [
            'croixes' => $croixRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_croix_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CroixRepository $croixRepository): Response
    {
        $croix = new Croix();
        $form = $this->createForm(CroixType::class, $croix);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $croixRepository->save($croix, true);

            return $this->redirectToRoute('app_croix_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('croix/new.html.twig', [
            'croix' => $croix,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_croix_show', methods: ['GET'])]
    public function show(Croix $croix): Response
    {
        return $this->render('croix/show.html.twig', [
            'croix' => $croix,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_croix_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Croix $croix, CroixRepository $croixRepository): Response
    {
        $form = $this->createForm(CroixType::class, $croix);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $croixRepository->save($croix, true);

            return $this->redirectToRoute('app_croix_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('croix/edit.html.twig', [
            'croix' => $croix,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_croix_delete', methods: ['POST'])]
    public function delete(Request $request, Croix $croix, CroixRepository $croixRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$croix->getId(), $request->request->get('_token'))) {
            $croixRepository->remove($croix, true);
        }

        return $this->redirectToRoute('app_croix_index', [], Response::HTTP_SEE_OTHER);
    }
}
