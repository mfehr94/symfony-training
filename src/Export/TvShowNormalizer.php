<?php


namespace App\Export;


use App\Entity\TvShow;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class TvShowNormalizer implements NormalizerInterface
{

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        /** @var TvShow $object */
        return [
            'title' => $object->getTitle(),
            'description' => $object->getDescription(),
            'episode_count' => $object->getEpisodeCount(),
            'rating' => $object->getRating()
        ];
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof TvShow;
    }
}
