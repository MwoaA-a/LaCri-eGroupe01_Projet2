<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilControler extends AbstractController
{
    #[Route('', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilControler',
        ]);
    }

    #[Route('/Lots', name: 'app_Lots')]
    public function Lots(): Response
    {
        return $this->render('accueil/Lots.html.twig', [
            'controller_name' => 'AccueilControler',
        ]);
    }

    #[Route('/facture', name: 'app_facture')]
    public function facturation(): Response
    {
        return $this->render('accueil/facturation.html.twig', [
            'controller_name' => 'AccueilControler',
        ]);
    }

    #[Route('/mon-compte', name: 'app_compte')]
    public function compte(): Response
    {
        return $this->render('accueil/compte.html.twig', [
            'controller_name' => 'AccueilControler',
        ]);
    }
}
