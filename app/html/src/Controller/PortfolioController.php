<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioController extends AbstractController
{
    public function list(ProjectRepository $projectRepository, SkillRepository $skillRepository)
    {
        return $this->render('portfolio.html.twig', [
            'projects' => $projectRepository->findByActivated(),
            'skills' => $skillRepository->findAll()
        ]);
    }
}
