<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
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
    private $user_lastname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $user_date_create;

    /**
     * @ORM\Column(type="datetime")
     */
    private $user_date_modif;

    /**
     * @ORM\Column(type="datetime")
     */
    private $user_date_delete;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserLastname(): ?string
    {
        return $this->user_lastname;
    }

    public function setUserLastname(string $user_lastname): self
    {
        $this->user_lastname = $user_lastname;

        return $this;
    }

    public function getUserFirstname(): ?string
    {
        return $this->user_firstname;
    }

    public function setUserFirstname(string $user_firstname): self
    {
        $this->user_firstname = $user_firstname;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->user_password;
    }

    public function setUserPassword(string $user_password): self
    {
        $this->user_password = $user_password;

        return $this;
    }

    public function getUserDateCreate(): ?\DateTimeInterface
    {
        return $this->user_date_create;
    }

    public function setUserDateCreate(\DateTimeInterface $user_date_create): self
    {
        $this->user_date_create = $user_date_create;

        return $this;
    }

    public function getUserDateModif(): ?\DateTimeInterface
    {
        return $this->user_date_modif;
    }

    public function setUserDateModif(\DateTimeInterface $user_date_modif): self
    {
        $this->user_date_modif = $user_date_modif;

        return $this;
    }

    public function getUserDateDelete(): ?\DateTimeInterface
    {
        return $this->user_date_delete;
    }

    public function setUserDateDelete(\DateTimeInterface $user_date_delete): self
    {
        $this->user_date_delete = $user_date_delete;

        return $this;
    }
}
