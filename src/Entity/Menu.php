<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 */
class Menu
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
    private $detailsMenu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomMenu;

    /**
     * @ORM\ManyToOne(targetEntity=Plat::class, inversedBy="menus")
     */
    private $plats;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetailsMenu(): ?string
    {
        return $this->detailsMenu;
    }

    public function setDetailsMenu(string $detailsMenu): self
    {
        $this->detailsMenu = $detailsMenu;

        return $this;
    }

    public function getNomMenu(): ?string
    {
        return $this->nomMenu;
    }

    public function setNomMenu(string $nomMenu): self
    {
        $this->nomMenu = $nomMenu;

        return $this;
    }

    public function getPlats(): ?Plat
    {
        return $this->plats;
    }

    public function setPlats(?Plat $plats): self
    {
        $this->plats = $plats;

        return $this;
    }
}
