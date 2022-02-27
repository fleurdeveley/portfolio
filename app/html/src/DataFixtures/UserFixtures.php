<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    protected $hasher;
    protected $admin;

    public function __construct(UserPasswordHasherInterface $hasher)
    {
        $this->hasher = $hasher;
    }

    public function load(ObjectManager $manager): void
    {        
        //add one admin user
        $admin = new User();

        $admin->setEmail("fleurdeveley@gmail.com")
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->hasher->hashPassword($admin, 'garfield06'));

        $manager->persist($admin);
        
        $manager->flush();
    }
}