<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Empresa;
use App\Entity\Oferta;
use App\Entity\Candidat;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        $emp1 = new Empresa();
        $emp1->setCorreu("a18oscortsol@inspedralbes.cat")
              ->setLogo("logo1.png")
              ->setTipus("tècnologia");
        $manager->persist($emp1);
        $emp2 = new Empresa();
        $emp2->setCorreu("a18oscortsol@iam.cat")
              ->setLogo("logo2.png")
              ->setTipus("socials");
        $manager->persist($emp2);

        $of1 = new Oferta();
        $of1->setDataPub(new \DateTime())
            ->setDescripcio("desenvolupador web")
            ->setEmpresa($emp1);
        $manager->persist($of1);
        
        $of2 = new Oferta();
        $of2->setDataPub(new \DateTime())
            ->setDescripcio("ASIX")
            ->setEmpresa($emp2);
        $manager->persist($of2);

        $ca1 = new Candidat();
        $ca1->setNom("Oscar")
            ->setCognms("Ruiz")
            ->setTelefon("1111")
            ->addOfertum($of1);
        $manager->persist($ca1);

        $ca2 = new Candidat();
        $ca2->setNom("Oscar")
            ->setCognms("Ruiz")
            ->setTelefon("1111")
            ->addOfertum($of2);
        $manager->persist($ca2);
        
        $manager->flush();
    }
}
