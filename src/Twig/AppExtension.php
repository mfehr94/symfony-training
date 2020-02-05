<?php


namespace App\Twig;


use App\Entity\TvShow;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    /**
     * @var string
     */
    private $basePath;

    public function __construct(string $basePath)
    {
        $filePath = __DIR__ . '/../../public/' . $basePath;

        if(!is_dir($filePath)) {
            throw new \InvalidArgumentException('Invalid base path');
        }
        $this->basePath = $basePath;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('thumb_path', [ $this, 'thumbnailPath'])
        ];
    }

    public function thumbnailPath(TVShow $show)
    {
        return sprintf('/thumbnails/%s.jpg', $show->getSlug());
    }
}
