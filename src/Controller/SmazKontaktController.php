<?php

namespace App\Controller;

use App\Repository\KontaktRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


// třida určená pro smazání vybraného kontaktu
class SmazKontaktController extends AbstractController
{
    private $em;
    private $kontaktRepository;

    public function __construct(EntityManagerInterface $em, KontaktRepository  $kontaktRepository)
    {
        $this->em = $em;
        $this->kontaktRepository  = $kontaktRepository;
    }


    /*
        metoda smaže vybraný kontaktu z databáze dle idčka, které dostala Routa jako parametr z index.html.twig kde je odkaz href 
    */
    #[Route('/smaz/{id}', name: 'smaz_kontakt', defaults: ['id' => null], methods: ['GET', 'DELETE'])]
    public function smazKontakt($id): Response
    {
        // vyber z databáze informace o kontaktu dle vybraného idčka
        $mazanyKontakt =  $this->kontaktRepository->find($id);

        // vytvoření dotazu pro smazání vybraného kontaktu
        $this->em->remove($mazanyKontakt);

        // proveď změnu
        $this->em->flush();

        // po smazání přesměruj na routu s názvem adresar, neboli na hlavní stránku aplikace
        return $this->redirectToRoute('adresar');

    }
}
