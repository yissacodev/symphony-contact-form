<?php

namespace App\DataFixtures;

use App\Entity\ContactArea;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $area_1 = new ContactArea();
        $area_1->setAreaName("Administración");

        $area_2 = new ContactArea();
        $area_2->setAreaName("Recursos humanos");

        $area_3 = new ContactArea();
        $area_3->setAreaName("Direción");

        $area_4 = new ContactArea();
        $area_4->setAreaName("Mercadeo");

        $manager->persist( $area_1);
        $manager->persist( $area_2);
        $manager->persist( $area_3);
        $manager->persist( $area_4);



        $user = new User();
        $user->setEmail("test@mail.com");
        $user->setPassword(md5("1234"));
        $user->setName("Tester");
        $user->setLastName("Acosta");
        $user->setPhoneNumber("98745");
        $user->setMensaje("Lorem ipsum Sit Amet");
        $user->setContactArea($area_4);

        $manager->persist( $user );
        $manager->flush();
    }
}
