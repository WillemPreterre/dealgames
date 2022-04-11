<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 */
class Annonce
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $annonce_title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $annonce_description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $annonce_date;

    /**
     * @ORM\Column(type="datetime")
     */
    private $annonce_date_modif;

    /**
     * @ORM\Column(type="datetime")
     */
    private $annonce_date_delete;

    /**
     * @ORM\Column(type="string", length=255)
     */

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnonceTitle(): ?string
    {
        return $this->annonce_title;
    }

    public function setAnnonceTitle(string $annonce_title): self
    {
        $this->annonce_title = $annonce_title;

        return $this;
    }

    public function getAnnonceDescription(): ?string
    {
        return $this->annonce_description;
    }

    public function setAnnonceDescription(string $annonce_description): self
    {
        $this->annonce_description = $annonce_description;

        return $this;
    }

    public function getAnnonceDate(): ?\DateTimeInterface
    {
        return $this->annonce_date;
    }

    public function setAnnonceDate(\DateTimeInterface $annonce_date): self
    {
        $this->annonce_date = $annonce_date;

        return $this;
    }

    public function getAnnonceDateModif(): ?\DateTimeInterface
    {
        return $this->annonce_date_modif;
    }

    public function setAnnonceDateModif(\DateTimeInterface $annonce_date_modif): self
    {
        $this->annonce_date_modif = $annonce_date_modif;

        return $this;
    }

    public function getAnnonceDateDelete(): ?\DateTimeInterface
    {
        return $this->annonce_date_delete;
    }

    public function setAnnonceDateDelete(\DateTimeInterface $annonce_date_delete): self
    {
        $this->annonce_date_delete = $annonce_date_delete;

        return $this;
    }

}
