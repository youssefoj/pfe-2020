<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
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
    private $RefProjet;

    /**
     * @ORM\Column(type="datetime")
     */
    private $DateCreation;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\OneToMany(targetEntity=Requete::class, mappedBy="Projet")
     */
    private $requetes;

    public function __construct()
    {
        $this->requetes = new ArrayCollection();
    }

 

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefProjet(): ?int
    {
        return $this->RefProjet;
    }

    public function setRefProjet(int $RefProjet): self
    {
        $this->RefProjet = $RefProjet;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->DateCreation;
    }

    public function setDateCreation(\DateTimeInterface $DateCreation): self
    {
        $this->DateCreation = $DateCreation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    /**
     * @return Collection|Requete[]
     */
    public function getRefRequete(): Collection
    {
        return $this->RefRequete;
    }

    public function addRefRequete(Requete $refRequete): self
    {
        if (!$this->RefRequete->contains($refRequete)) {
            $this->RefRequete[] = $refRequete;
        }

        return $this;
    }

    public function removeRefRequete(Requete $refRequete): self
    {
        if ($this->RefRequete->contains($refRequete)) {
            $this->RefRequete->removeElement($refRequete);
        }

        return $this;
    }

    /**
     * @return Collection|Requete[]
     */
    public function getRequetes(): Collection
    {
        return $this->requetes;
    }

    public function addRequete(Requete $requete): self
    {
        if (!$this->requetes->contains($requete)) {
            $this->requetes[] = $requete;
            $requete->setProjet($this);
        }

        return $this;
    }

    public function removeRequete(Requete $requete): self
    {
        if ($this->requetes->contains($requete)) {
            $this->requetes->removeElement($requete);
            // set the owning side to null (unless already changed)
            if ($requete->getProjet() === $this) {
                $requete->setProjet(null);
            }
        }

        return $this;
    }
}
