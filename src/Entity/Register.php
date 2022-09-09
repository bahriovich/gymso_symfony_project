<?php

namespace App\Entity;

use App\Repository\RegisterRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RegisterRepository::class)
 */
class Register
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
    private $cf_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cf_email;

    /**
     * @ORM\Column(type="integer")
     */
    private $cf_phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cf_message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCfName(): ?string
    {
        return $this->cf_name;
    }

    public function setCfName(string $cf_name): self
    {
        $this->cf_name = $cf_name;

        return $this;
    }

    public function getCfEmail(): ?string
    {
        return $this->cf_email;
    }

    public function setCfEmail(string $cf_email): self
    {
        $this->cf_email = $cf_email;

        return $this;
    }

    public function getCfPhone(): ?int
    {
        return $this->cf_phone;
    }

    public function setCfPhone(int $cf_phone): self
    {
        $this->cf_phone = $cf_phone;

        return $this;
    }

    public function getCfMessage(): ?string
    {
        return $this->cf_message;
    }

    public function setCfMessage(string $cf_message): self
    {
        $this->cf_message = $cf_message;

        return $this;
    }
}
