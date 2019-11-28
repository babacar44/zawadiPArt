<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ChildRepository")
 */
class Child
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
    private $nomComplet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    /**
     * @ORM\Column(type="date")
     */
    private $dateNais;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Donation", mappedBy="child")
     */
    private $donations;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Education", mappedBy="child", cascade={"persist", "remove"})
     */
    private $education;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Health", mappedBy="child", cascade={"persist", "remove"})
     */
    private $health;

    public function __construct()
    {
        $this->donations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->nomComplet;
    }

    public function setNomComplet(string $nomComplet): self
    {
        $this->nomComplet = $nomComplet;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getDateNais(): ?\DateTimeInterface
    {
        return $this->dateNais;
    }

    public function setDateNais(\DateTimeInterface $dateNais): self
    {
        $this->dateNais = $dateNais;

        return $this;
    }

    /**
     * @return Collection|Donation[]
     */
    public function getDonations(): Collection
    {
        return $this->donations;
    }

    public function addDonation(Donation $donation): self
    {
        if (!$this->donations->contains($donation)) {
            $this->donations[] = $donation;
            $donation->setChild($this);
        }

        return $this;
    }

    public function removeDonation(Donation $donation): self
    {
        if ($this->donations->contains($donation)) {
            $this->donations->removeElement($donation);
            // set the owning side to null (unless already changed)
            if ($donation->getChild() === $this) {
                $donation->setChild(null);
            }
        }

        return $this;
    }

    public function getEducation(): ?Education
    {
        return $this->education;
    }

    public function setEducation(Education $education): self
    {
        $this->education = $education;

        // set the owning side of the relation if necessary
        if ($education->getChild() !== $this) {
            $education->setChild($this);
        }

        return $this;
    }

    public function getHealth(): ?Health
    {
        return $this->health;
    }

    public function setHealth(Health $health): self
    {
        $this->health = $health;

        // set the owning side of the relation if necessary
        if ($health->getChild() !== $this) {
            $health->setChild($this);
        }

        return $this;
    }

   
}
