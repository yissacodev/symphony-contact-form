<?php

namespace App\Entity;

use App\Repository\ContactAreaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactAreaRepository::class)]
class ContactArea
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $area_name = null;

    #[ORM\OneToMany(mappedBy: 'contactArea', targetEntity: User::class, orphanRemoval: true)]
    private Collection $cod_area;

    public function __construct()
    {
        $this->cod_area = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAreaName(): ?string
    {
        return $this->area_name;
    }

    public function setAreaName(string $area_name): static
    {
        $this->area_name = $area_name;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getCodArea(): Collection
    {
        return $this->cod_area;
    }

    public function addCodArea(User $codArea): static
    {
        if (!$this->cod_area->contains($codArea)) {
            $this->cod_area->add($codArea);
            $codArea->setContactArea($this);
        }

        return $this;
    }

    public function removeCodArea(User $codArea): static
    {
        if ($this->cod_area->removeElement($codArea)) {
            // set the owning side to null (unless already changed)
            if ($codArea->getContactArea() === $this) {
                $codArea->setContactArea(null);
            }
        }

        return $this;
    }
}
