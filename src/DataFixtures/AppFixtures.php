<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{

    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
    }

    public function loadUsers(ObjectManager $manager): void
    {
        echo " \n\nles utilisateurs : \n";

        $admin = new User();
        $password = $this->passwordEncoder->encodePassword($admin, 'iamadmin');
        $admin->setPassword($password);
        $admin->setRoles(['ROLE_ADMIN'])
            ->setFirstName('admin')->setLastName('admin')->setEmail('admin@admin.com');
        $manager->persist($admin);
        echo $admin."\n";

        $client = new User();
        $password = $this->passwordEncoder->encodePassword($client, 'client');
        $client->setPassword($password);
        $client->setRoles(['ROLE_USER'])->setFirstName('client')->setLastName('client')
            ->setEmail('client@example.com');
        $manager->persist($client);
        echo $client."\n";

        $client2 = new User();
        $password = $this->passwordEncoder->encodePassword($client, 'client2');
        $client2->setPassword($password);
        $client2->setRoles(['ROLE_USER'])->setFirstName('client2')->setLastName('client2')
            ->setEmail('client2@example.com');
        $manager->persist($client2);
        echo $client2."\n";

        $manager->flush();

        $manager->flush();
    }
}
