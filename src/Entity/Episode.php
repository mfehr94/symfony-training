<?php

declare(strict_types = 1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EpisodeRepository")
 */
class Episode
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TvShow", inversedBy="episodes")
     */
    private $tvShow;

    /**
     * @ORM\Column(length=512)
     */
    private $title;

    /**
     * @ORM\Column(type="smallint", options={"unsigned": true})
     */
    private $seasonNumber;

    /**
     * @ORM\Column(type="smallint", options={"unsigned": true})
     */
    private $episodeNumber;

    public function __construct(TvShow $tvShow, string $title, int $seasonNumber, int $episodeNumber)
    {
        $this->tvShow = $tvShow;
        $this->title = $title;

        if ($seasonNumber <= 0) {
            throw new \InvalidArgumentException('Season number must be a value higher than zero.');
        }

        $this->seasonNumber = $seasonNumber;

        if ($episodeNumber <= 0) {
            throw new \InvalidArgumentException('Episode number must be a value higher than zero.');
        }

        $this->episodeNumber = $episodeNumber;
    }

    public function getTvShow(): TvShow
    {
        return $this->tvShow;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSeasonNumber(): int
    {
        return $this->seasonNumber;
    }

    public function getEpisodeNumber(): int
    {
        return $this->episodeNumber;
    }

    public function getEpisodeKey(): string
    {
        return sprintf('S%02dE%02d', $this->getSeasonNumber(), $this->getEpisodeNumber());
    }
}
