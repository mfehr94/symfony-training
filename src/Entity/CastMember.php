<?php

declare(strict_types = 1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class CastMember
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column
     */
    private $name;

    /**
     * @ORM\Column(type="smallint", options={"unsigned": true})
     */
    private $birthYear;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"unsigned": true})
     */
    private $deathYear;

    public function __construct(string $name, int $birthYear, int $deathYear = null)
    {
        $this->name = $name;
        $this->birthYear = $birthYear;
        $this->deathYear = $deathYear;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBirthYear(): int
    {
        return $this->birthYear;
    }

    public function getDeathYear(): ?int
    {
        return $this->deathYear;
    }

    public function isDead(): bool
    {
        return null !== $this->deathYear;
    }
}
