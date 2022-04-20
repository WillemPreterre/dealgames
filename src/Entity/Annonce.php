<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AnnonceRepository;
use Vich\UploaderBundle\Entity\File as EmbeddedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass=AnnonceRepository::class)
 * @Vich\Uploadable
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
     * @ORM\Column(type="text")
     */
    private $annonce_description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $annonce_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $annonce_date_modif;
    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="annonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $relation;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */

    private $photoName;

  /**
     * @Vich\UploadableField(mapping="products", fileNameProperty="photo_name")
     */
    private $photoFile;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="annonce",cascade={"persist"})
     */
    private $user;


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

    public function getRelation(): ?Category
    {
        return $this->relation;
    }

    public function setRelation(?Category $relation): self
    {
        $this->relation = $relation;

        return $this;
    }


    /**
     * Get the value of photoFile
     */ 
    public function getPhotoFile()
    {
        return $this->photoFile;
    }

    /**
     * Set the value of photoFile
     *
     * @return  self
     */ 
    public function setPhotoFile($photoFile)
    {
        $this->photoFile = $photoFile;

        return $this;
    }

    /**
     * Get the value of photoName
     */ 
    public function getPhotoName()
    {
        return $this->photoName;
    }

    /**
     * Set the value of photoName
     *
     * @return  self
     */ 
    public function setPhotoName($photoName)
    {
        $this->photoName = $photoName;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

}
