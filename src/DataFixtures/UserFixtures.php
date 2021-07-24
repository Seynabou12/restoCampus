<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;


class UserFixtures extends Fixture
{
   
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setNom("Dione");
        $user->setPrenom("Seynabou");
        $user->setEmail("dioneseynabou0@gmail.com");
        $user->setTelephone("781794521");
        $user->setPassword("");

        $manager->persist($user);
        // $product = new Product();
        // $manager->persist($product);
        
        $manager->flush();
    }
}
