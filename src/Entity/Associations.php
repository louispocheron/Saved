<?php

namespace App\Entity;

use App\Repository\AssociationsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AssociationsRepository::class)
 */
class Associations
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
    private $name;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity=action::class, mappedBy="associations")
     */
    private $id_action;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="association_id")
     */
    private $users;

    /**
     * @ORM\Column(type="string", length=10000, nullable=true)
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=user::class, inversedBy="associations")
     */
    private $user;

    public function __construct()
    {
        $this->id_action = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * @return Collection|action[]
     */
    public function getIdAction(): Collection
    {
        return $this->id_action;
    }

    public function addIdAction(action $idAction): self
    {
        if (!$this->id_action->contains($idAction)) {
            $this->id_action[] = $idAction;
            $idAction->setAssociations($this);
        }

        return $this;
    }

    public function removeIdAction(action $idAction): self
    {
        if ($this->id_action->removeElement($idAction)) {
            // set the owning side to null (unless already changed)
            if ($idAction->getAssociations() === $this) {
                $idAction->setAssociations(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user)
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addAssociationId($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeAssociationId($this);
        }

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|user[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }
}
