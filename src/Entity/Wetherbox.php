<?php

namespace App\Entity;

use App\Repository\WetherboxRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=WetherboxRepository::class)
 */
class Wetherbox
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="json")
     */
    private $weatherjson = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getWeatherjson(): ?array
    {
        return $this->weatherjson;
    }

    public function setWeatherjson(array $weatherjson): self
    {
        $this->weatherjson = $weatherjson;

        return $this;
    }
}
