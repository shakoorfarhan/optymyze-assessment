<?php
namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User
{
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
    * @Gedmo\Mapping\Annotation\Timestampable(on="create")
    * @Doctrine\ORM\Mapping\Column(type="datetime")
    */
    protected $createdAt;

    /**
    * @var \DateTime
    * @Gedmo\Mapping\Annotation\Timestampable(on="update")
    * @Doctrine\ORM\Mapping\Column(type="datetime")
    */
    protected $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tariff", mappedBy="user")
     */
    private $tariffs;

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
}