<?php

namespace App\DataFixtures;

use App\Entity\Feature;
use App\Entity\Project;
use App\Entity\Skill;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PortfolioFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {        
        // Add one project
        $project = new Project;

        $project->setName('SnowTricks')
            ->setDescription('Site communautaire autour du snowboard')
            ->setImage('snowtricks.png')
            ->setUrlSite('https://projet6.fleurdeveley.fr/')
            ->setUrlGithub('https://github.com/fleurdeveley/OC_P6_SnowTricks')
            ->setActivated(1)
            ->setCreatedAt(new DateTimeImmutable())
            ->setUpdatedAt(new DateTimeImmutable());

        // Add skills to the project
        $skills = ['symfony', 'composer', 'bootstrap', 'uml'];

        foreach($skills as $name) {
            $skill = new Skill;

            $skill->setName($name)
                ->setCreatedAt(new DateTimeImmutable())
                ->setUpdatedAt(new DateTimeImmutable());

            $manager->persist($skill);

            $project->addskill($skill);
        }

        // Add features to the project
        $features = [
            'zone d\'administration',
            'rôles et permissions',
            'formulaire d\'inscription',
            'mot de passe oublié'
        ];

        foreach($features as $text) {
            $feature = new Feature;

            $feature->setProjects($project->getId(1))
                ->setText($text)
                ->setCreatedAt(new DateTimeImmutable())
                ->setUpdatedAt(new DateTimeImmutable());

            $manager->persist($feature);

            $project->addfeature($feature);
        }

        $manager->persist($project);
        
        $manager->flush();
    }
}
