<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CandidatRepository")
 */
class Candidat
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cognms;

    /**
     * @ORM\Column(type="integer")
     */
    private $telefon;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oferta", mappedBy="candidat")
     */
    private $oferta;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $estudis;

    public function __construct()
    {
        $this->oferta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getCognms(): ?string
    {
        return $this->cognms;
    }

    public function setCognms(string $cognms): self
    {
        $this->cognms = $cognms;

        return $this;
    }

    public function getTelefon(): ?int
    {
        return $this->telefon;
    }

    public function setTelefon(int $telefon): self
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * @return Collection|Oferta[]
     */
    public function getOferta(): Collection
    {
        return $this->oferta;
    }

    public function addOfertum(Oferta $ofertum): self
    {
        if (!$this->oferta->contains($ofertum)) {
            $this->oferta[] = $ofertum;
            $ofertum->setCandidat($this);
        }

        return $this;
    }

    public function removeOfertum(Oferta $ofertum): self
    {
        if ($this->oferta->contains($ofertum)) {
            $this->oferta->removeElement($ofertum);
            // set the owning side to null (unless already changed)
            if ($ofertum->getCandidat() === $this) {
                $ofertum->setCandidat(null);
            }
        }

        return $this;
    }

    public function getEstudis(): ?string
    {
        return $this->estudis;
    }

    public function setEstudis(string $estudis): self
    {
        $this->estudis = $estudis;

        return $this;
    }
}
