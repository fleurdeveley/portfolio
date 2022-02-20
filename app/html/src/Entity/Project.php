<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjectRepository::class)
 */
class Project
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
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_site;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url_github;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $activated;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updated_at;

    /**
     * @ORM\ManyToMany(targetEntity=Skill::class, mappedBy="projects")
     */
    private $skills;

    /**
     * @ORM\OneToMany(targetEntity=Feature::class, mappedBy="projects", orphanRemoval=true)
     */
    private $features;

    public function __construct()
    {
        $this->skills = new ArrayCollection();
        $this->features = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getUrlSite(): ?string
    {
        return $this->url_site;
    }

    public function setUrlSite(string $url_site): self
    {
        $this->url_site = $url_site;

        return $this;
    }

    public function getUrlGithub(): ?string
    {
        return $this->url_github;
    }

    public function setUrlGithub(string $url_github): self
    {
        $this->url_github = $url_github;

        return $this;
    }

    public function getActivated(): ?bool
    {
        return $this->activated;
    }

    public function setActivated(?bool $activated): self
    {
        $this->activated = $activated;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeImmutable $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * @return Collection|Skill[]
     */
    public function getSkills(): Collection
    {
        return $this->skills;
    }

    public function addSkill(Skill $skill): self
    {
        if (!$this->skills->contains($skill)) {
            $this->skills[] = $skill;
            $skill->addProject($this);
        }

        return $this;
    }

    public function removeSkill(Skill $skill): self
    {
        if ($this->skills->removeElement($skill)) {
            $skill->removeProject($this);
        }

        return $this;
    }

    /**
     * @return Collection|Feature[]
     */
    public function getFeatures(): Collection
    {
        return $this->features;
    }

    public function addFeature(Feature $feature): self
    {
        if (!$this->features->contains($feature)) {
            $this->features[] = $feature;
            $feature->setProjects($this);
        }

        return $this;
    }

    public function removeFeature(Feature $feature): self
    {
        if ($this->features->removeElement($feature)) {
            // set the owning side to null (unless already changed)
            if ($feature->getProjects() === $this) {
                $feature->setProjects(null);
            }
        }

        return $this;
    }
}
