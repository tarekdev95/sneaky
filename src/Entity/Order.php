<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'myorder')]
    #[ORM\JoinColumn(nullable: false)]
    private ?users $user_name = null;

    /**
     * @var Collection<int, articles>
     */
    #[ORM\ManyToMany(targetEntity: articles::class, inversedBy: 'orderref')]
    private Collection $article_name;

    #[ORM\Column]
    private ?\DateTimeImmutable $orderdate = null;

    public function __construct()
    {
        $this->article_name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?users
    {
        return $this->user_name;
    }

    public function setUserName(?users $user_name): static
    {
        $this->user_name = $user_name;

        return $this;
    }

    /**
     * @return Collection<int, articles>
     */
    public function getArticleName(): Collection
    {
        return $this->article_name;
    }

    public function addArticleName(articles $articleName): static
    {
        if (!$this->article_name->contains($articleName)) {
            $this->article_name->add($articleName);
        }

        return $this;
    }

    public function removeArticleName(articles $articleName): static
    {
        $this->article_name->removeElement($articleName);

        return $this;
    }

    public function getOrderdate(): ?\DateTimeImmutable
    {
        return $this->orderdate;
    }

    public function setOrderdate(\DateTimeImmutable $orderdate): static
    {
        $this->orderdate = $orderdate;

        return $this;
    }
}
