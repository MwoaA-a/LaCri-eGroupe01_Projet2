<?php

namespace App\Controller;

use App\Entity\Facture;
use App\Entity\Lots;
use SebastianBergmann\Environment\Console;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Dompdf\Dompdf;


class FacturationController extends AbstractController
{
    #[Route('/facture/{date}', name: 'app_facture')]
    public function facture(String $date, EntityManagerInterface $entityManager, UrlGeneratorInterface $urlGenerator,Request $request): Response
    {
        // Vérification du format de la date
        $format = 'd_m_Y';
        $dateValide = \DateTime::createFromFormat($format, $date);
        if (!$dateValide || $dateValide->format($format) !== $date) {
            $ad = new \DateTime('now');
            $dateActuelle = $ad->format('d_m_Y');
            return $this->redirect('/facture/'.$dateActuelle);

        }
    
        $ad = \DateTime::createFromFormat($format, $date);
        $tb = $entityManager->createQueryBuilder()
            ->select('l.id, l.numBateau, l.espece, l.poidsBrutLot, b.nom, e.nom as asd')
            ->from('App\Entity\Lots','l')
            ->leftJoin('App\Entity\Bateau', 'b', 'WITH','l.numBateau = b.id')
            ->leftJoin('App\Entity\Espece', 'e', 'WITH','l.espece = e.id')
            ->where('l.codeEtat = 1','l.datePeche = :date')
            ->setParameters(array('date' => $ad->format('Y-m-d')))
            ->getQuery();
    
        $ListeLots = $tb->execute();
        return $this->render('facturation/facture.html.twig', [
            'controller_name' => 'AccueilControler',
            'equa' => $ListeLots,
            'currentDate' => $ad->format('d/m/Y'),
        ]);
    }

    #[Route('/facture', name: 'app_facture2')]
    public function facture2(EntityManagerInterface $entityManager, RequestStack $requestStack): Response
    {
        
        $page = $requestStack->getCurrentRequest()->query->get('page', 1);
        $limit = 10; // Nombre d'éléments par page

        $qb = $entityManager->createQueryBuilder()
            ->select('f')
            ->from('App\Entity\Facture', 'f')
            ->setFirstResult(($page - 1) * $limit)
            ->setMaxResults($limit)
            ->orderBy('f.id', 'DESC');

        $query = $qb->getQuery();

        $paginator = new \Doctrine\ORM\Tools\Pagination\Paginator($query);

        $totalItems = $paginator->count();
        $totalPages = ceil($totalItems / $limit);

        return $this->render('facturation/addFact.html.twig', [
            'controller_name' => 'AccueilControler',
            'fac' => $paginator,
            'currentPage' => $page,
            'totalPages' => $totalPages,
        ]);
    }

    #[Route('/facture/modification/ajout', name: 'app_facture4')]
    public function facture4(EntityManagerInterface $entityManager, RequestStack $requestStack): Response
    {
        
        $facture = new Facture();

            $date = new \DateTime();        

            $facture->setDateFacturation($date);
            $facture->setEtat(0);
    
            // Persistez la facture dans la base de données
            $entityManager->persist($facture);
            $entityManager->flush();

            return $this->redirect('/facture/');
    }

    #[Route('/facture/fermer/{id}', name: 'app_facture_fermer')]
    public function facture5(EntityManagerInterface $entityManager, RequestStack $requestStack, String $id): Response
    {
        
        $facture = $entityManager->getRepository(Facture::class)->find($id);

        if (!$facture) {
        throw $this->createNotFoundException('Facture non trouvée');
        }

        $facture->setEtat(1);

        $entityManager->flush();

        return $this->redirect('/facture');
    }

    #[Route('/facture/modification/fac_{id}', name: 'app_facture3')]
    public function facture3(EntityManagerInterface $entityManager, RequestStack $requestStack, String $id, Request $request): Response
    {
        if ($request->isMethod('POST')) {
            if ($request->request->has('addLotbtn')) {
                $selectedLot = $request->request->get('Lot');
                $addLot = $entityManager->getRepository(Lots::class)->find($selectedLot);
                $id = (int) $id; // convertie $id de String en INT
                $addLot->setIdFacture($id);
                $addLot->setCodeEtat(2);
    
                $entityManager->flush();
    
                return $this->redirectToRoute('app_facture3', ['id' => $id]);
            } elseif ($request->request->has('suppLotFormbtn')) {
                $selectedLot = $request->request->get('idLotSupp');
                $addLot = $entityManager->getRepository(Lots::class)->find($selectedLot);
                $addLot->setIdFacture(null);
                $addLot->setCodeEtat(1);
    
                $entityManager->flush();
                
                return $this->redirectToRoute('app_facture3', ['id' => $id]);
            }
        }

        $qb = $entityManager->createQueryBuilder()
        ->select('l.id, b.nom, l.datePeche, e.nom as espece')
        ->from('App\Entity\Lots','l')
        ->leftJoin('App\Entity\Bateau', 'b', 'WITH','l.numBateau = b.id')
        ->leftJoin('App\Entity\Espece', 'e', 'WITH','l.espece = e.id')
        ->where('l.codeEtat = 1')
        ->getQuery();

        $ListeLots = $qb->execute();

        $tb = $entityManager->createQueryBuilder()
        ->select('l.id, b.nom, l.datePeche, e.nom as espece')
        ->from('App\Entity\Lots','l')
        ->leftJoin('App\Entity\Bateau', 'b', 'WITH','l.numBateau = b.id')
        ->leftJoin('App\Entity\Espece', 'e', 'WITH','l.espece = e.id')
        ->where('l.idFacture = :id')
        ->setParameters(array('id' => $id))
        ->getQuery();

        $lot = $tb->execute();
        

        return $this->render('facturation/facModif.html.twig', [
            'controller_name' => 'AccueilControler',
            'lot' => $ListeLots,
            'idFac' => $id,
            'lotFac' => $lot,
        ]);
    }

    #[Route("/facture/impression/facture_{id}.pdf", name: 'app_pdf_generator_fac')]
    public function index2(EntityManagerInterface $entityManager, string $id): Response
    {
        

        $qb = $entityManager->createQueryBuilder()
            ->select('l.id, b.immatriculation as Imma, l.datePeche, l.espece, l.poidsBrutLot, el.label, b.nom, e.nom as asd')
            ->from('App\Entity\Lots','l')
            ->leftJoin('App\Entity\Bateau', 'b', 'WITH','l.numBateau = b.id')
            ->leftJoin('App\Entity\EtatLots', 'el', 'WITH','l.codeEtat = el.id')
            ->leftJoin('App\Entity\Espece', 'e', 'WITH','l.espece = e.id')
            ->where('l.idFacture = :id')
            ->setParameters(array('id' => $id))
            ->getQuery();

        $ListeLots = $qb->execute();

        $html = $this->renderView('facturation/pdfFacture.html.twig', [
            'controller_name' => 'PdfGeneratorController',
            'lot' => $ListeLots,
            'idlot' => $id,
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Utiliser la date de l'URL pour le nom du PDF
        $pdfName = "{$id}_facture.pdf";

        return new Response (
            $dompdf->stream($pdfName, ["Attachment" => false]),
            Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );
    }
}
