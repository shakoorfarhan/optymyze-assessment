<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tariff")
 * @ORM\HasLifecycleCallbacks
 */
class Tariff {

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="tariffs")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $tariff;

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

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(?User $user):self
    {
        $this->user = $user;

        return $this;
    }

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getTariff(){
        return $this->tariff;
    }

    public function setTariff($tariff){
        $this->tariff = $tariff;
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
        return $this->type. ' '.$this->tariff;
    }

    public function getId(){
        return $this->id;
    }
}