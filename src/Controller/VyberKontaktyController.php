<?php

namespace App\Controller;

use App\Entity\Kontakt;
use App\Repository\KontaktRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// Třída pro vypsání informací vybraných kontaktů podle jména, do URL se zadá /jan a vypise vše o kontkatu s jménem jan (když má více kontaktů jméno jan, tak se zobrazí více řádků tabulky)
class VyberKontaktyController extends AbstractController
{

    private $em;
    private $kontaktRepository;

    public function __construct(EntityManagerInterface $em, KontaktRepository  $kontaktRepository)
    {
        $this->em = $em;
        $this->kontaktRepository = $kontaktRepository;
    }

    // pokud se zadá URL /jmeno, jmeno coby parametr routy 
    #[Route('/{jmeno}', name: 'vybrani_kontaktu', defaults: ['jmeno' => null], methods: ['GET'])]
    public function vyberKontaktu($jmeno): Response
    {
        // Repozitář pro prácí s entitou Kontakt
        $this->kontaktRepository = $this->em->getRepository(Kontakt::class);

        // dotaz na vypsání informací z entity kontakt kde je všude jméno stejné jako paramter routy 
        $vybraneKontakty = $this->kontaktRepository->findBy(['jmeno' => $jmeno]);

        // předání vyfiltrovaného výpisu do šablony 
        return $this->render('vyberKontaktu.html.twig', [
            'vybraneKontakty' =>  $vybraneKontakty
        ]);
    }
}
