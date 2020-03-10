<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EmpresaRepository")
 */
class Empresa
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
    private $tipus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correu;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Oferta", mappedBy="empresa", orphanRemoval=true)
     */
    private $oferta;

    public function __construct()
    {
        $this->oferta = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTipus(): ?string
    {
        return $this->tipus;
    }

    public function setTipus(string $tipus): self
    {
        $this->tipus = $tipus;

        return $this;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getCorreu(): ?string
    {
        return $this->correu;
    }

    public function setCorreu(string $correu): self
    {
        $this->correu = $correu;

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
            $ofertum->setEmpresa($this);
        }

        return $this;
    }

    public function removeOfertum(Oferta $ofertum): self
    {
        if ($this->oferta->contains($ofertum)) {
            $this->oferta->removeElement($ofertum);
            // set the owning side to null (unless already changed)
            if ($ofertum->getEmpresa() === $this) {
                $ofertum->setEmpresa(null);
            }
        }

        return $this;
    }
}
