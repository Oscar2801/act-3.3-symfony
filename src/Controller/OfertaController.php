<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OfertaController extends AbstractController
{
    /**
     * @Route("/oferta", name="oferta")
     */
    public function index()
    {
        return $this->render('oferta/index.html.twig', [
            'controller_name' => 'OfertaController',
        ]);
    }
}
