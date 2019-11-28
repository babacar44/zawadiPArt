<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DonationRepository")
 */
class Donation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="date")
     */
    private $dateDonation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\donators", inversedBy="donations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $donator;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\child", inversedBy="donations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $child;

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDateDonation(): ?\DateTimeInterface
    {
        return $this->dateDonation;
    }

    public function setDateDonation(\DateTimeInterface $dateDonation): self
    {
        $this->dateDonation = $dateDonation;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getDonator(): ?donators
    {
        return $this->donator;
    }

    public function setDonator(?donators $donator): self
    {
        $this->donator = $donator;

        return $this;
    }

    public function getChild(): ?child
    {
        return $this->child;
    }

    public function setChild(?child $child): self
    {
        $this->child = $child;

        return $this;
    }

}
