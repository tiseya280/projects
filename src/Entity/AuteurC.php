<?php

namespace App\Entity;

use App\Repository\AuteurCRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AuteurCRepository::class)]
class AuteurC extends Auteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nb_livre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbLivre(): ?int
    {
        return $this->nb_livre;
    }

    public function setNbLivre(int $nb_livre): self
    {
        $this->nb_livre = $nb_livre;

        return $this;
    }
}
