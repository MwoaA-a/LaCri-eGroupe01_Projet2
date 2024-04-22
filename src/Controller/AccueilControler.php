<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class AccueilControler extends AbstractController
{
    #[Route('', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilControler',
        ]);
    }


    #[Route('/Lots/{date}', name: 'app_Lots')]
    public function lot(String $date, EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator): Response
    {
        // Vérification du format de la date
        $format = 'd_m_Y';
        $dateValide = \DateTime::createFromFormat($format, $date);
        if (!$dateValide || $dateValide->format($format) !== $date) {
            $ad = new \DateTime('now');
            $dateActuelle = $ad->format('d_m_Y');
            return $this->redirect('/Lots/'.$dateActuelle);

        }
    
        $ad = \DateTime::createFromFormat($format, $date);
        $db = $entityManager->createQueryBuilder()
            ->select('l.id, l.numBateau, l.espece, l.poidsBrutLot, el.label, b.nom, e.nom as asd')
            ->from('App\Entity\Lots','l')
            ->leftJoin('App\Entity\Bateau', 'b', 'WITH','l.numBateau = b.id')
            ->leftJoin('App\Entity\EtatLots', 'el', 'WITH','l.codeEtat = el.id')
            ->leftJoin('App\Entity\Espece', 'e', 'WITH','l.espece = e.id')
            ->where('l.datePeche = :date') 
            ->setParameters(array('date' => $ad->format('Y-m-d')))
            ->getQuery();
    
        $ListeLots = $db->execute();
        return $this->render('accueil/Lots.html.twig', [
            'controller_name' => 'AccueilControler',
            'equa' => $ListeLots,
            'currentDate' => $ad->format('d/m/Y'),
        ]);
    }

    #[Route('/equarrissage', name: 'app_equa')]
    public function Lots2(EntityManagerInterface $entityManager): Response
    {
        $ad = new \DateTime('now');
        /*$lotsRepo = $entityManager->getRepository(Lots::class);
        $listeLots = $lotsRepo->findBy(['datePeche' => $ad,
                                        'equa' => 1]);*/
        $qb = $entityManager->createQueryBuilder()
            ->select('l.id, l.numBateau, l.espece, l.poidsBrutLot, el.label, b.nom, e.nom as asd')
            ->from('App\Entity\Lots','l')
            ->leftJoin('App\Entity\Bateau', 'b', 'WITH','l.numBateau = b.id')
            ->leftJoin('App\Entity\EtatLots', 'el', 'WITH','l.codeEtat = el.id')
            ->leftJoin('App\Entity\Espece', 'e', 'WITH','l.espece = e.id')
            ->where('l.codeEtat = 3','l.datePeche = :date')
            ->setParameters(array('date' => $ad->format('Y-m-d')))
            ->getQuery();

        $ListeLots = $qb->execute();

        return $this->render('accueil/LotsEqua.html.twig', [
            'controller_name' => 'AccueilControler',
            'equa' => $ListeLots,
            'currentDate' => date('d/m/Y'),
            'CurrentDateBtn'=> date('d_m_Y')]);
    }

    #[Route('/mon-compte', name: 'app_compte')]
    public function compte(): Response
    {
        return $this->render('accueil/compte.html.twig', [
            'controller_name' => 'AccueilControler',
        ]);
    }

    #[Route('/info', name: 'app_info')]
    public function info(): Response
    {
        return $this->render('accueil/info.html.twig', [
            'controller_name' => 'AccueilControler',
        ]);
    }
}
