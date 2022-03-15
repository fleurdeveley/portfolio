<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    protected $admin;
    protected $hasher;
    protected $parameterBag;

    public function __construct(UserPasswordHasherInterface $hasher, ParameterBagInterface $parameterBag)
    {
        $this->hasher = $hasher;
        $this->parameterBag = $parameterBag;
    }

    public function load(ObjectManager $manager): void
    {        
        //add one admin user
        $admin = new User();
        $admin->setEmail($this->parameterBag->get('LOGIN'))
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->hasher->hashPassword($admin, $this->parameterBag->get('PASSWORD')));

        $manager->persist($admin);
        
        $manager->flush();
    }
}
