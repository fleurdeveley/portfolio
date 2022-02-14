<?php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\Skill;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class PortfolioFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {        
        $skills = [
            'symfony',
            'composer',
            'phpunit',
            'api rest',
            'codacy',
            'blackfire',
            'php',
            'mysql',
            'poo',
            'mvc',
            'boostrap',
            'uml',
            'wordpress',
            'widgets',
            'intégration'
        ];

        foreach($skills as $name) {
            $skill = new Skill;

            $skill->setName($name)
                ->setCreatedAt(new DateTimeImmutable())
                ->setUpdatedAt(new DateTimeImmutable());

            $manager->persist($skill);
        }

        $project = new Project;

        $project->setName('SnowTricks')
            ->setDescription('Site communautaire autour du snowboard')
            ->setImage('snowtricks.png')
            ->setUrlSite('https://projet6.fleurdeveley.fr/')
            ->setUrlGithub('https://github.com/fleurdeveley/OC_P6_SnowTricks')
            ->setActivated(1)
            ->setCreatedAt(new DateTimeImmutable())
            ->setUpdatedAt(new DateTimeImmutable());

        $manager->persist($project);
        
        $manager->flush();
    }
}
