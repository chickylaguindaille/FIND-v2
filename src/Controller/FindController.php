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
use App\Repository\CroixRepository;
use JMS\Serializer\SerializerBuilder;

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
        $requestString = $request->get('searchVille');
        if ($requestString != null){
        return new Response(json_encode($requestString));
    }
        // exit(var_dump($searchville));

        // TABLEAU VILLE
        $serializer = SerializerBuilder::create()->build();
        $ville = $villeRepository->findAll();
        $ville = $serializer->toArray($ville);

        $data['villes'] = $ville;
        $data['country'] = $country;

        // $data['test'] = $searchville;

        return $this->render('location/town.html.twig', $data );
    }

    // CORPORATIONS
    #[Route('/Localisation/{country}/{ville}/Corporations', name: 'corporations', methods: ['GET'])]
    public function corporations($country, $ville, Request $request, VilleRepository $villeRepository, CorporationsRepository $corporationsRepository): Response
    {

        // TABLEAU CORPORATIONS
        $serializer = SerializerBuilder::create()->build();
        $corporations = $corporationsRepository->findAll();
        $corporations = $serializer->toArray($corporations);

        $data['corporations'] = $corporations;
        $data['country'] = $country;
        $data['ville'] = $ville;

        return $this->render('corporations/corporations.html.twig', $data);
    }

    // CORPORATION
    #[Route('/Localisation/{country}/{ville}/{corpo}/{id}', name: 'corporation', methods: ['GET'])]
    public function corporation($country, $ville, Request $request, Corporations $corporation, ParticularitesRepository $particularitesRepository, AnecdotesRepository $anecdotesRepository, ChantRepository $chantRepository, DecorumRepository $decorumRepository, PinsRepository $pinsRepository, CroixRepository $croixRepository): Response
    {

        $serializer = SerializerBuilder::create()->build();

        $particularites = $particularitesRepository->findAll();
        $data['particularites'] = $serializer->toArray($particularites);

        $anecdotes = $anecdotesRepository->findAll();
        $data['anecdotes'] = $serializer->toArray($anecdotes);

        $chant = $chantRepository->findAll();
        $data['chant'] = $serializer->toArray($chant);

        $decorum = $decorumRepository->findAll();
        $data['decorum'] = $serializer->toArray($decorum);

        $pins = $pinsRepository->findAll();
        $data['pins'] = $serializer->toArray($pins);

        $croix = $croixRepository->findAll();
        $data['croix'] = $serializer->toArray($croix);

        $data['country'] = $country;

        $data['ville'] = $ville;

        $data['corporation'] = $serializer->toArray($corporation);

        return $this->render('corporations/corporation.html.twig', $data);

    }


}