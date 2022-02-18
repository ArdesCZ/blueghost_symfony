<?php

namespace App\Controller;

use App\Entity\Kontakt;
use App\Repository\KontaktRepository;
use App\Form\KontaktFormularType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// Třida na úpravu vybraného kontaktu
// Symfony pro práci s formulářem  + databází využívá pouze jednu metodu (Nette a Laravel používá dvě), z toho důvodu můžu mít v metodě jak provedení změny v databázi, tak i filt který probíhá vlastně nejdříve
class UpravaKontaktuController extends AbstractController
{
    private $em;
    private $kontaktRepository;

    public function __construct(EntityManagerInterface $em, KontaktRepository  $kontaktRepository)
    {
        $this->em = $em;
        $this->kontaktRepository  = $kontaktRepository;
    }

    /* 
        pokud se zadá url /uprava/5 dojde k úpravě kontaktu s idčkem 5 
        je to z toho důvodu jelikož vyber kontakt pracuse s url /jmeno a tím dojde k výpisu údajů o všech kontaktech se zadaným parametrem jmeno (/jan)
    */
    #[Route('/uprava/{id}', name: 'uprava_kontaktu', defaults: ['id' => null])]
    public function upravKontakt($id, Request $request): Response
    {
        // Repozitář pro prácí s entitou Kontakt
        $upravovanyKontakt = $this->kontaktRepository->find($id);

        // použij prvky formulaře KontaktFormularType pro prácí s entitou
        $form = $this->createForm(KontaktFormularType::class, $upravovanyKontakt);

        // poslouchej zda se odeslal formulář
        $form->handleRequest($request);

        // pokud se odeslal formulář a je validní
        if ($form->isSubmitted() &&  $form->isValid()) {
            // pro každou položku z entity volej funkci set a do obsahu vlož obsah prvku formuláře
            $upravovanyKontakt ->setJmeno($form->get('jmeno')->getData());
            $upravovanyKontakt ->setPrijmeni($form->get('prijmeni')->getData());
            $upravovanyKontakt ->setTelefonniCislo($form->get('telefonniCislo')->getData());
            $upravovanyKontakt ->setEmail($form->get('email')->getData());
            $upravovanyKontakt ->setPoznamka($form->get('poznamka')->getData());

            // proveď změnu
            $this->em->flush();

            // po provedení změny přesměruj na routu s názvem adresar, neboli hlavní stránku aplikace
            return $this->redirectToRoute('adresar'); // zde se zadává název routy
        }

        // do šablony ulož informace o jednom vybraném kontaktu, který se bude upravovat a formulář, který se má zobrazit
        return $this->render('upravKontakt.html.twig', [
            'upravovanyKontakt' =>  $upravovanyKontakt,
            'form' => $form->createView()
        ]);
    }
}
