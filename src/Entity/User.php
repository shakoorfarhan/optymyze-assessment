<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\HasLifecycleCallbacks
 */
class User
{
    public function __construct(){
        $this->tariffs = new ArrayCollection();
    }

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $name;

    /**
    * @var \DateTime
    * @Doctrine\ORM\Mapping\Column(type="datetime")
    */
    protected $createdAt;

    /**
    * @var \DateTime
    * @Doctrine\ORM\Mapping\Column(type="datetime")
    */
    protected $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tariff", mappedBy="user", cascade={"persist"},orphanRemoval=true)
     */
    private  $tariffs;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return Collection|Tariff[]
     */
    public function getTariffs()
    {
        return $this->tariffs;
    }

    public function addTariff(Tariff $tariff)
    {
        if (!$this->tariffs->contains($tariff)) {
            $this->tariffs[] = $tariff;
            $tariff->setUser($this);
        }

        return $this;
    }

    public function removeTariff(Tariff $tariff)
    {
        if ($this->tariffs->contains($tariff)) {
            $this->tariffs->removeElement($tariff);
            if ($tariff->getUser() === $this) {
                $tariff->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps(): void
    {
        $dateTimeNow = new \DateTime('now');

        $this->setUpdatedAt($dateTimeNow);

        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($dateTimeNow);
        }
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->name;
    }
}