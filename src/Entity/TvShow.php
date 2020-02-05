<?php

declare(strict_types = 1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TvShowRepository")
 */
class TvShow
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
    private $title;

    /**
     * @ORM\Column(unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="float")
     */
    private $rating;

    /**
     * @ORM\Column(type="simple_array")
     */
    private $genres;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Episode", mappedBy="tvShow", cascade={"persist", "remove"}, fetch="EXTRA_LAZY")
     * @ORM\OrderBy({"seasonNumber": "ASC", "episodeNumber": "ASC"})
     */
    private $episodes;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\CastMember", cascade={"persist"})
     */
    private $castMembers;

    public function __construct(string $title, float $rating, array $genres, string $description)
    {
        $this->title = $title;
        $this->slug = $this->slugify($title);
        $this->rating = $rating;
        $this->genres = $genres;
        $this->description = $description;
        $this->episodes = new ArrayCollection();
        $this->castMembers = new ArrayCollection();
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    /**
     * @return string[]
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function addEpisode(string $title, int $seasonNumber, int $episodeNumber): void
    {
        $this->episodes->add(new Episode($this, $title, $seasonNumber, $episodeNumber));
    }

    /**
     * @return Episode[]
     */
    public function getEpisodes(): array
    {
        return $this->episodes->toArray();
    }

    public function getEpisodeCount(): int
    {
        return $this->episodes->count();
    }

    public function addCastMember(CastMember $actor): void
    {
        $this->castMembers->add($actor);
    }

    public function getCastMembers(): array
    {
        return $this->castMembers->toArray();
    }

    private function slugify(string $input): string
    {
        return urlencode(str_replace(['ä', 'ü', 'ö', 'ß', ' '], ['ae', 'ue', 'oe', 'ss', '-'], mb_strtolower($input)));
    }
}
