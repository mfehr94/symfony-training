<?php


namespace App\Tests\Entity;


use App\Entity\Episode;
use App\Entity\TvShow;
use PHPUnit\Framework\TestCase;

class EpisodeTest extends TestCase
{
    /**
     * @var TvShow
     */
    private $tvShow;

    protected function setUp()
    {
        $this->tvShow = new TvShow('title', 4, [], 'description');
    }

    public function testInvalidEpisodeKey(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $episode = new Episode($this->tvShow, 'title', -3, 2);
    }

    /**
     * @dataProvider provideEpisodeData
     */
    public function testEpisodeKey(int $season, int $episode, string $expectedKey)
    {
        $episode = new Episode($this->tvShow, 'title', $season, $episode);

        $this->assertSame($expectedKey, $episode->getEpisodeKey());
    }

    public function provideEpisodeData(): iterable
    {
        return [
            [2, 12, 'S02E12'],
            [1, 1, 'S01E01'],
            [2, 120, 'S02E120']
        ];
    }
}
