<?php
// Entita je ekvivalent databázové tabulky, vytváří se příkazem symfony console make:entity, dále postupovat pomocí průvodce
namespace App\Entity;

use App\Repository\KontaktRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=KontaktRepository::class)
 */
class Kontakt
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $jmeno;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $prijmeni;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefonniCislo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=200)
     */
    private $poznamka;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJmeno(): ?string
    {
        return $this->jmeno;
    }

    public function setJmeno(string $jmeno): self
    {
        $this->jmeno = $jmeno;

        return $this;
    }

    public function getPrijmeni(): ?string
    {
        return $this->prijmeni;
    }

    public function setPrijmeni(string $prijmeni): self
    {
        $this->prijmeni = $prijmeni;

        return $this;
    }

    public function getTelefonniCislo(): ?int
    {
        return $this->telefonniCislo;
    }

    public function setTelefonniCislo(int $telefonniCislo): self
    {
        $this->telefonniCislo = $telefonniCislo;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPoznamka(): ?string
    {
        return $this->poznamka;
    }

    public function setPoznamka(string $poznamka): self
    {
        $this->poznamka = $poznamka;

        return $this;
    }
}
