<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {

        $this->passwordEncoder = $passwordEncoder;
    }


    public function load(ObjectManager $manager)
    {

        $adminUser = new User();
        $adminUser->setEmail('admin@localhost');
        $adminUser->setPassword($this->passwordEncoder->encodePassword($adminUser,'admin'));
        $adminUser->setFirstName('John');
        $adminUser->setLastName('Doe');
        $adminUser->setRoles(['ROLE_ADMIN']);
        $manager->persist($adminUser);
        $manager->flush();

        $user = new User();
        $user->setEmail('user@localhost');
        $user->setPassword($this->passwordEncoder->encodePassword($user,'user'));
        $user->setFirstName('Jane');
        $user->setLastName('Doe');
        $manager->persist($user);
        $manager->flush();
    }
}
