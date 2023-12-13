<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/insertBateau', name:'insertBat')]
    function insert(Request $request)
    {
    $bateau=new Bateau; //Création d’une nouvelle instance de l’entité Bateau
    $formBateau= $this->createForm(BateauType::class,$bateau); //$formBateau correspond au formulaire BateauType externe initialisé avec la nouvelle instance de Bateau.
   
    $formBateau->add('creer', SubmitType::class,
    array('label'=>'Insertion d\'un bateau' )); //Création du bouton submit pour l’ajout d’un nouveau bateau
    if($request->isMethod('post')){
   
    return new JsonResponse($request->request->all());
    }
   
    return $this->render('Admin/createC.html.twig',
    array('my_form'=>$formBateau->createView())); //ajout du formulaire dans la vue de base createC.html.twig.
    } 
   
}
