<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Generator\UrlGenerator;

use App\Entity\Ville;
use App\Form\VilleType;
use App\Repository\VilleRepository;

use App\Entity\Corporations;
use App\Form\CorporationsType;
use App\Repository\CorporationsRepository;

class FindController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     * @Template()
     */
    public function accueil(Request $request)
    {
        return $this->render('accueil.html.twig');
    }

    // #[Route('/Localisation/France/Ville', name: 'villeFrance', methods: ['GET'])]
    // public function villesFrance(VilleRepository $villeRepository): Response
    // {
    //     $country="France";
    //     return $this->render('location/town.html.twig', [
    //         'villes' => $villeRepository->findAll(), 'country' => $country
    //     ]);
    // }

    // #[Route('/Localisation/Belgique/Ville', name: 'villeBelgique', methods: ['GET'])]
    // public function villesBelgique(VilleRepository $villeRepository): Response
    // {
    //     $country="Belgique";
    //     return $this->render('location/town.html.twig', [
    //         'villes' => $villeRepository->findAll(), 'country' => $country
    //     ]);
    // }

    #[Route('/Localisation/{country}/Ville', name: 'ville', methods: ['GET'])]
    public function villes($country, Request $request, VilleRepository $villeRepository): Response
    {
        return $this->render('location/town.html.twig', [
            'villes' => $villeRepository->findAll(), 'country' => $country
        ]);
    }

    #[Route('/Localisation/{country}/{ville}/Corporations', name: 'corporations', methods: ['GET'])]
    public function corporations($country, Request $request, VilleRepository $villeRepository, CorporationsRepository $corporationsRepository): Response
    {
        $ville="Paris";
        return $this->render('corporations/corporations.html.twig', [
            'corporations' => $corporationsRepository->findAll(), 'country' => $country, 'ville' => $ville
        ]);
    }


}