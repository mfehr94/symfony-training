<?php


namespace App\Tests\Export;


use App\Entity\Episode;
use App\Entity\TvShow;
use App\Export\EpisodeNormalizer;
use PHPUnit\Framework\TestCase;

class EpisodeNormalizerTest extends TestCase
{
    /**
     * @var TvShow
     */
    private $tvShow;

    protected function setUp()
    {
        $this->tvShow = new TvShow('title', 4, [], 'description');
    }

    public function testSupports(): void
    {
        $normalizer = new EpisodeNormalizer();
        $episode = new Episode($this->tvShow, 'title', 1, 1);

        $this->assertTrue($normalizer->supportsNormalization($episode));
    }

    public function testNotSupports(): void
    {
        $normalizer = new EpisodeNormalizer();
        $tvShow = $this->tvShow;

        $this->assertFalse($normalizer->supportsNormalization($tvShow));
    }

    public function testNormalize(): void
    {
        $normalizer = new EpisodeNormalizer();
        $episode = new Episode($this->tvShow, 'title', 1, 1);

        $this->assertEquals(
            [
                'tv_show' => 'title',
                'key' => 'S01E01',
                'title' => 'title'
            ],
            $normalizer->normalize($episode)
        );
    }
}
