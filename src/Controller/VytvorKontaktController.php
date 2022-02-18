<?php

namespace App\Controller;

use App\Entity\Kontakt;
use App\Form\KontaktFormularType;
use App\Repository\KontaktRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// třida pro vytvoření nového kontaktu
class VytvorKontaktController extends AbstractController
{
    private $em; 

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    // Metoda která přesměruje na Routu s URL /kontakt/vytvor kde je formulář pro vytvoření nového kontaktu
    // Routa musí být ve tvaru kontakt/vytvor nebot bez toho kontakt/ by to bralo jako paramter routy jméno 
    #[Route('/kontakt/vytvor', name: 'vytvoteni_kontaktu')]
    public function vytvorKontakt(Request $request): Response
    {
        // vytvoření nové instance entity Kontakt
        $kontakt = new Kontakt();

        // použití formuláře KontaktFormularType pro vkládání do entity kontakt    
        $form = $this->createForm(KontaktFormularType::class, $kontakt);

        // naslouchej odeslání formuláře
        $form->handleRequest($request);

        // pokud se odeslal formulář a je validní tak:
        if ($form->isSubmitted() && $form->isValid()) {

            // získej informace z formuláře
            $novyKontakt = $form->getData();

            // vytvoř SQL dotaz pro vložení
            $this->em->persist($novyKontakt);

            // proveď dotaz
            $this->em->flush();

            // po vložení přes,ěruj na routu s názvem adresa, neboli na hlavni stránku aplikace
            return $this->redirectToRoute('adresar'); // zde se zadává název routy
        }
        
        // předej prázdný formulář do šablony ytvorKontakt.html.twig coby proměnnou
        return $this->render('vytvorKontakt.html.twig', [
            'form' => $form->createView()
        ]);
    }
}