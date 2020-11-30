<?php

namespace App\Entity;

use App\Repository\AnimalRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnimalRepository::class)
 */
class Animal
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Race::class, inversedBy="animals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $race;

    /**
     * @ORM\ManyToOne(targetEntity=Adopter::class, inversedBy="animals")
     */
    private $adopter;

    /**
     * @ORM\ManyToOne(targetEntity=Refuge::class, inversedBy="animals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $refuge;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isSterilized;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isVaccined;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $adoptedOn;

    /**
     * @ORM\ManyToOne(targetEntity=Specie::class, inversedBy="animals")
     * @ORM\JoinColumn(nullable=false)
     */
    private $specie;

    /**
     * @ORM\OneToMany(targetEntity=Image::class, mappedBy="animal", cascade={"persist", "remove"})
     */
    private $images;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->createdAt = new DateTime('today');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRace(): ?Race
    {
        return $this->race;
    }

    public function setRace(?Race $race): self
    {
        $this->race = $race;

        return $this;
    }

    public function getAdopter(): ?Adopter
    {
        return $this->adopter;
    }

    public function setAdopter(?Adopter $adopter): self
    {
        $this->adopter = $adopter;

        return $this;
    }

    public function getRefuge(): ?Refuge
    {
        return $this->refuge;
    }

    public function setRefuge(?Refuge $refuge): self
    {
        $this->refuge = $refuge;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsSterilized(): ?bool
    {
        return $this->isSterilized;
    }

    public function setIsSterilized(bool $isSterilized): self
    {
        $this->isSterilized = $isSterilized;

        return $this;
    }

    public function getIsVaccined(): ?bool
    {
        return $this->isVaccined;
    }

    public function setIsVaccined(?bool $isVaccined): self
    {
        $this->isVaccined = $isVaccined;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getAdoptedOn(): ?\DateTimeInterface
    {
        return $this->adoptedOn;
    }

    public function setAdoptedOn(\DateTimeInterface $adoptedOn): self
    {
        $this->adoptedOn = $adoptedOn;

        return $this;
    }

    public function getSpecie(): ?Specie
    {
        return $this->specie;
    }

    public function setSpecie(?Specie $specie): self
    {
        $this->specie = $specie;

        return $this;
    }

    /**
     * @return Collection|Image[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setAnimal($this);
        }

        return $this;
    }

    public function removeImage(Image $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getAnimal() === $this) {
                $image->setAnimal(null);
            }
        }

        return $this;
    }
}
