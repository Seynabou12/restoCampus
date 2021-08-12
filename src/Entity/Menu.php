<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\MenuRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=MenuRepository::class)
 * @ORM\HasLifecycleCallbacks() 
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

    /**
     * @ORM\OneToMany(targetEntity=Plats::class, mappedBy="menu")
     */
    private $plats;

    /**
     * @ORM\Column(type="datetime")
     * 
     */
    private $createAt;

    public function __construct()
    {
        $this->plats = new ArrayCollection();
    }


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

    /**
     * @return Collection|Plats[]
     */
    public function getPlats(): Collection
    {
        return $this->plats;
    }

    public function addPlat(Plats $plat): self
    {
        if (!$this->plats->contains($plat)) {
            $this->plats[] = $plat;
            $plat->setMenu($this);
        }

        return $this;
    }

    public function removePlat(Plats $plat): self
    {
        if ($this->plats->removeElement($plat)) {
            // set the owning side to null (unless already changed)
            if ($plat->getMenu() === $this) {
                $plat->setMenu(null);
            }
        }

        return $this;
    }

    public function getCreateAt(): ?\DateTime
    {
        return $this->createAt;
    }
    
    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function setCreateAt()
    {
        $this->createAt = new DateTime();

        return $this;
    }

}
