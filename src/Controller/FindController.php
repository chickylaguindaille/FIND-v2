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
use App\Entity\Particularites;
use App\Entity\Anecdotes;
use App\Form\CorporationsType;
use App\Form\ParticularitesType;
use App\Form\AnecdotesType;
use App\Repository\CorporationsRepository;
use App\Repository\ParticularitesRepository;
use App\Repository\AnecdotesRepository;
use App\Repository\ChantRepository;
use App\Repository\DecorumRepository;
use App\Repository\PinsRepository;

class FindController extends AbstractController
{
    // ACCUEIL
    /**
     * @Route("/accueil", name="accueil")
     * @Template()
     */
    public function accueil(Request $request)
    {
        return $this->render('accueil.html.twig');
    }

    // VILLES
    #[Route('/Localisation/{country}/Ville', name: 'ville', methods: ['GET'])]
    public function villes($country, Request $request, VilleRepository $villeRepository): Response
    {
        // exit(var_dump($villeRepository['villes']['nom']));
        return $this->render('location/town.html.twig', [
            'villes' => $villeRepository->findAll(), 'country' => $country
        ]);
    }

    // CORPORATIONS
    #[Route('/Localisation/{country}/{ville}/Corporations', name: 'corporations', methods: ['GET'])]
    public function corporations($country, $ville, Request $request, VilleRepository $villeRepository, CorporationsRepository $corporationsRepository): Response
    {
        return $this->render('corporations/corporations.html.twig', [
            'corporations' => $corporationsRepository->findAll(), 
            'country' => $country, 
            'ville' => $ville
        ]);
    }

    // CORPORATION
    #[Route('/Localisation/{country}/{ville}/{corpo}/{id}', name: 'corporation', methods: ['GET'])]
    public function corporation($country, $ville, Request $request, VilleRepository $villeRepository, CorporationsRepository $corporationsRepository, Corporations $corporation, ParticularitesRepository $particularitesRepository, AnecdotesRepository $anecdotesRepository, ChantRepository $chantRepository, DecorumRepository $decorumRepository, PinsRepository $pinsRepository): Response
    {
        return $this->render('corporations/corporation.html.twig', [
            'corporations' => $corporationsRepository->findAll(),
            $particularites = $particularitesRepository->findAll(),
            $anecdotes = $anecdotesRepository->findAll(),
            $chant = $chantRepository->findAll(),
            $decorum = $decorumRepository->findAll(),
            $pins = $pinsRepository->findAll(),
            'country' => $country, 'ville' => $ville,
            'corporation' => $corporation,
            'particularites' => $particularites,
            'anecdotes' => $anecdotes,
            'chant' => $chant,
            'decorum' => $decorum,
            'pins' => $pins
        ]);

    }


}