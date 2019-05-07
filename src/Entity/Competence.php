<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompetenceRepository")
 */
class Competence
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $desc1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $desc2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $desc3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $desc4;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $categorie;

    /**
     * @ORM\Column(type="integer")
     */
    private $etat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDesc1(): ?string
    {
        return $this->desc1;
    }

    public function setDesc1(?string $desc1): self
    {
        $this->desc1 = $desc1;

        return $this;
    }

    public function getDesc2(): ?string
    {
        return $this->desc2;
    }

    public function setDesc2(?string $desc2): self
    {
        $this->desc2 = $desc2;

        return $this;
    }

    public function getDesc3(): ?string
    {
        return $this->desc3;
    }

    public function setDesc3(?string $desc3): self
    {
        $this->desc3 = $desc3;

        return $this;
    }

    public function getDesc4(): ?string
    {
        return $this->desc4;
    }

    public function setDesc4(?string $desc4): self
    {
        $this->desc4 = $desc4;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getEtat(): ?int
    {
        return $this->etat;
    }

    public function setEtat(int $etat): self
    {
        $this->etat = $etat;

        return $this;
    }
}
