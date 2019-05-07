<?php

namespace App\Controller;

use App\Entity\Competence;
use App\Repository\CompetenceRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class HomeController
{

    private $twig;
    private $competenceRepository;

    /**
     * @Route("/", name="home")
     * @param Environment $twig
     * @param CompetenceRepository $competenceRepository
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function index(Environment $twig, CompetenceRepository $competenceRepository) : Response
    {

        $this->twig = $twig;
        $this->competenceRepository = $competenceRepository;

        $cards = $this->competenceRepository->findAll();
        return new Response($this->twig->render("index.html.twig",[
            "cards" => $cards,
        ]));
    }

    /**
     * @Route("/getvalue", name="ajax")
     * @param CompetenceRepository $competenceRepository
     * @return JsonResponse
     */
    public function somme(CompetenceRepository $competenceRepository) : JsonResponse
    {
        $this->competenceRepository = $competenceRepository;

        $cards = $this->competenceRepository->findAll();
        $somme = 0;

        for ($i=0; $i < count($cards); $i++) {
            $somme += $cards[$i]->getEtat();
        }

        $somme = ($somme / (count($cards) * 3)) *100;

        return new JsonResponse([
            'somme' => $somme
        ], 200);

    }

    /**
     * @Route("/upgrade/{id}", name="upgrade")
     * @param ObjectManager $objectManager
     * @param Competence $competence
     * @return JsonResponse
     */
    public function upgrade(ObjectManager $objectManager, Competence $competence) : JsonResponse
    {

        if($competence->getEtat() < 3) {
            $competence->setEtat($competence->getEtat()+1);
        }
        else if ($competence->getEtat() == 3) {
            $competence->setEtat(0);
        }

        $objectManager->persist($competence);
        $objectManager->flush();

        return new JsonResponse([
            'upgrade' => true,
            'id' => $competence->getNom(),
            'etat' => $competence->getEtat()
        ], 200);
    }


}