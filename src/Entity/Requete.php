<?php

namespace App\Entity;

use App\Repository\RequeteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RequeteRepository::class)
 */
class Requete
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
    private $RefeReq;

    /**
     * @ORM\Column(type="date")
     */
    private $DateCreation;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=Projet::class, inversedBy="requetes")
     */
    private $Projet;

   


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefeReq(): ?int
    {
        return $this->RefeReq;
    }

    public function setRefeReq(int $RefeReq): self
    {
        $this->RefeReq = $RefeReq;

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

    public function getProjet(): ?Projet
    {
        return $this->Projet;
    }

    public function setProjet(?Projet $Projet): self
    {
        $this->Projet = $Projet;

        return $this;
    }

}
