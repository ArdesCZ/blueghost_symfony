<?php

namespace App\Controller;

use App\Entity\Kontakt;
use App\Form\KontaktFormularType;
use App\Repository\KontaktRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdresarController extends AbstractController
{

    private $em; // proměnná em určená na přístupnění metod pro práci s databází
    private $kontaktRepository; // proměnná kontaktRepository určená na přístupnění metod pro práci s sql dotazy

    // konstruktor pro definici globálních proměnných 
    public function __construct(EntityManagerInterface $em, KontaktRepository  $kontaktRepository)
    {
        $this->em = $em;
        $this->kontaktRepository  = $kontaktRepository;
    }


    /* 
        jakomile se načte url s root neboli výchozí dojde k výpisu entity Kontakt
        nezapomenout psát názvy rout, jelikož se používají v href nebo redirectToRoute 
    */
    #[Route('/', name: 'adresar')]
    public function index(): Response
    {
        // Repozitář pro prácí s entitou Kontakt
        $this->kontaktRepository = $this->em->getRepository(Kontakt::class);


        // Uložení obsahu Entity Kontakt, náhrada za SELECT * FROM Kontakt
        // findAll() => SELECT * FROM kontakt
        // find(1) => SELECT * FROM kontakt where id = 1

        /* 
            findBy([],['id' => DESC]) => SELECT * FROM kontakt ORDER BY  id DESC 
            prvni prazdna zavorka tam byt musi, kdyz chci zobrzeni ASC tak tam druha zavorka byt nemusi
        */
        /*
            findOneBy(['id'=>1, 'jmeno' => 'Petr'],['id' => DESC]) => SELECT * FROM kontakt WHERE id = 1 AND jmeno = 'Petr' ORDER BY id DESC
         */

        //count('id' => 1) => SELECT COUNT() FROM kontakt WHERE id = 1
        //getClassName() => cesta k souboru s entitou a název entity


        $kontakty = $this->kontaktRepository->findAll();

        // předání výpisu tabulky do šablony přes proměnnou
        return $this->render('index.html.twig', [
            'kontakty' => $kontakty
        ]);
    }
}
