<?php

namespace App\DataFixtures;

use App\Entity\Skill;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class SkillFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $skills = [
            'symfony',
            'composer',
            'phpunit',
            'api rest',
            'codacy',
            'blacfire',
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

        $manager->flush();
    }
}
