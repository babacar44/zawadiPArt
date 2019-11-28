<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HealthRepository")
 */
class Health
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
    private $nomMaladie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $pieceJointe;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\child", inversedBy="health", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $child;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomMaladie(): ?string
    {
        return $this->nomMaladie;
    }

    public function setNomMaladie(string $nomMaladie): self
    {
        $this->nomMaladie = $nomMaladie;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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

    public function getStatut(): ?string
    {
        return $this->statut;
    }

    public function setStatut(string $statut): self
    {
        $this->statut = $statut;

        return $this;
    }

    public function getPieceJointe(): ?string
    {
        return $this->pieceJointe;
    }

    public function setPieceJointe(?string $pieceJointe): self
    {
        $this->pieceJointe = $pieceJointe;

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
