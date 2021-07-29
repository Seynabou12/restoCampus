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
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="menu")
     */
    private $restaurant;


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
    public function getRestaurant(): ?Restaurant
    {
        return $this->restaurant;
    }

    public function setRestaurant(?Restaurant $restaurant): self
    {
        $this->restaurant = $restaurant;

        return $this;
    }

}
