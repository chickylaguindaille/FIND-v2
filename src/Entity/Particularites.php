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
    private ?int $id_corporation = null;

    #[ORM\Column(length: 255)]
    private ?string $particularite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCorporation(): ?int
    {
        return $this->id_corporation;
    }

    public function setIdCorporation(int $id_corporation): self
    {
        $this->id_corporation = $id_corporation;

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
