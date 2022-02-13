<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioController extends AbstractController
{
    public function list(ProjectRepository $projectRepository, SkillRepository $skillRepository)
    {
        $projects = $projectRepository->findAll();
        $skills = $skillRepository->findAll();

        return $this->render('portfolio.html.twig', [
            'projects' => $projects,
            'skills' => $skills
        ]);
    }
}
