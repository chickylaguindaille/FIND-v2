<?php

namespace App\Entity;

use App\Repository\AnecdotesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnecdotesRepository::class)]
class Anecdotes
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idcorporation = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $anecdote = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdcorporation(): ?int
    {
        return $this->idcorporation;
    }

    public function setIdcorporation(int $idcorporation): self
    {
        $this->idcorporation = $idcorporation;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAnecdote(): ?string
    {
        return $this->anecdote;
    }

    public function setAnecdote(string $anecdote): self
    {
        $this->anecdote = $anecdote;

        return $this;
    }
}
