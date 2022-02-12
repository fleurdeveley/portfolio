<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioController extends AbstractController
{
    public function list(ProjectRepository $projectRepository, SkillRepository $skillRepository)
    {
        $projects = $projectRepository->findBy([], [], 1);
        $skills = $skillRepository->findby([], [], 1);

        return $this->render('portfolio.html.twig', [
            'projects' => $projects,
            'skills' => $skills
        ]);
    }
}
