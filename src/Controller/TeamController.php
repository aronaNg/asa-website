<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamController extends AbstractController
{
    /**
     * @Route("/team", name="team")
     */
    public function index(TeamRepository $teamRepository): Response
    {
        $teams=$teamRepository->findAll();
        return $this->render('home/team.html.twig', [
            'teams' => $teams,
        ]);
    }

}
