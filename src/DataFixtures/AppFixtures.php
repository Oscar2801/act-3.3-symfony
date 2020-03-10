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
              ->setTipus("tècnologia")
              ->setNom("Empresario S.L");
        $manager->persist($emp1);

        $emp2 = new Empresa();
        $emp2->setCorreu("a18oscortsol@iam.cat")
              ->setLogo("logo2.png")
              ->setTipus("socials")
              ->setNom("Aidalai S.L");
        $manager->persist($emp2);

        $of1 = new Oferta();
        $of1->setDataPub(new \DateTime())
            ->setDescripcio("desenvolupador web")
            ->setEmpresa($emp1)
            ->setTitol("Oferta per a caixer a Caprabo");
        $manager->persist($of1);
        
        $of2 = new Oferta();
        $of2->setDataPub(new \DateTime())
            ->setDescripcio("ASIX")
            ->setEmpresa($emp2)
            ->setTitol("Oferta per a repartidor de pizza");
        $manager->persist($of2);

        $ca1 = new Candidat();
        $ca1->setNom("Oscar")
            ->setCognms("Ruiz")
            ->setTelefon("1111")
            ->addOfertum($of1)
            ->setEstudis("CFGS informatica");
        $manager->persist($ca1);

        $ca2 = new Candidat();
        $ca2->setNom("Oscar")
            ->setCognms("Ruiz")
            ->setTelefon("1111")
            ->addOfertum($of2)
            ->setEstudis("CFGS automocio");
        $manager->persist($ca2);

        $manager->flush();
    }
}
