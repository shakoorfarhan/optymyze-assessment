<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tariff")
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

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user)
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
}