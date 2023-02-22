<?php

namespace App\Controller;

use App\Entity\Pins;
use App\Form\PinsType;
use App\Repository\PinsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/pins')]
class PinsController extends AbstractController
{
    #[Route('/', name: 'app_pins_index', methods: ['GET'])]
    public function index(PinsRepository $pinsRepository): Response
    {
        return $this->render('pins/index.html.twig', [
            'pins' => $pinsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_pins_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PinsRepository $pinsRepository): Response
    {
        $pin = new Pins();
        $form = $this->createForm(PinsType::class, $pin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pinsRepository->save($pin, true);

            return $this->redirectToRoute('app_pins_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pins/new.html.twig', [
            'pin' => $pin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pins_show', methods: ['GET'])]
    public function show(Pins $pin): Response
    {
        return $this->render('pins/show.html.twig', [
            'pin' => $pin,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_pins_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Pins $pin, PinsRepository $pinsRepository): Response
    {
        $form = $this->createForm(PinsType::class, $pin);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $pinsRepository->save($pin, true);

            return $this->redirectToRoute('app_pins_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('pins/edit.html.twig', [
            'pin' => $pin,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_pins_delete', methods: ['POST'])]
    public function delete(Request $request, Pins $pin, PinsRepository $pinsRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$pin->getId(), $request->request->get('_token'))) {
            $pinsRepository->remove($pin, true);
        }

        return $this->redirectToRoute('app_pins_index', [], Response::HTTP_SEE_OTHER);
    }
}
