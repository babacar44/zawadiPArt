<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EducationRepository")
 */
class Education
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $niveauScolaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $besoins;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\child", inversedBy="education", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $child;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveauScolaire(): ?string
    {
        return $this->niveauScolaire;
    }

    public function setNiveauScolaire(?string $niveauScolaire): self
    {
        $this->niveauScolaire = $niveauScolaire;

        return $this;
    }

    public function getBesoins(): ?string
    {
        return $this->besoins;
    }

    public function setBesoins(string $besoins): self
    {
        $this->besoins = $besoins;

        return $this;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getChild(): ?child
    {
        return $this->child;
    }

    public function setChild(child $child): self
    {
        $this->child = $child;

        return $this;
    }

   
}
