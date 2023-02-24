<?php

namespace App\Entity;

use App\Repository\ParticularitesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticularitesRepository::class)]
class Particularites
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idcorporation = null;

    #[ORM\Column(length: 255)]
    private ?string $particularite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCorporation(): ?int
    {
        return $this->idcorporation;
    }

    public function setIdCorporation(int $idcorporation): self
    {
        $this->idcorporation = $idcorporation;

        return $this;
    }

    public function getParticularite(): ?string
    {
        return $this->particularite;
    }

    public function setParticularite(string $particularite): self
    {
        $this->particularite = $particularite;

        return $this;
    }
}
