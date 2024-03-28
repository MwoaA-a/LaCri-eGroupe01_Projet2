<?php
 
namespace App\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Dompdf\Dompdf;
 
class PdfGeneratorController extends AbstractController
{
    #[Route("/equarrissage/{date}.pdf", name: 'app_pdf_generator')]
    public function index(EntityManagerInterface $entityManager, string $date): Response
    {
        // Convertir la date de l'URL en un objet DateTime
        $ad = \DateTime::createFromFormat('d_m_Y', $date);
        if (!$ad) {
            throw $this->createNotFoundException('Date invalide');
        }

        $qb = $entityManager->createQueryBuilder()
            ->select('l.id, l.numBateau, l.espece, l.poidsBrutLot, l.codeEtat, b.nom, e.nom as asd')
            ->from('App\Entity\Lots','l')
            ->leftJoin('App\Entity\Bateau', 'b', 'WITH','l.numBateau = b.id')
            ->leftJoin('App\Entity\Espece', 'e', 'WITH','l.espece = e.id')
            ->where('l.equa = 1')
            ->where('l.datePeche = :date')
            ->setParameters(array('date' => $ad->format('Y-m-d')))
            ->getQuery();

        $ListeLots = $qb->execute();

        $html = $this->renderView('pdf_generator/pdf.html.twig', [
            'controller_name' => 'PdfGeneratorController',
            'equa' => $ListeLots,
            'currentDate' => $ad->format('d/m/Y'), // Utiliser la date de l'URL
        ]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Utiliser la date de l'URL pour le nom du PDF
        $pdfName = "{$date}_equarrissage.pdf";

        return new Response (
            $dompdf->stream($pdfName, ["Attachment" => false]),
            Response::HTTP_OK,
            ['Content-Type' => 'application/pdf']
        );
    }

    private function imageToBase64($path) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
}