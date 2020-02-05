<?php


namespace App\Export;


use App\Entity\Episode;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\LogicException;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class EpisodeNormalizer implements NormalizerInterface
{

    /**
     * @inheritDoc
     */
    public function normalize($object, $format = null, array $context = [])
    {
        /** @var Episode $object */
        return [
            'title' => $object->getTitle(),
            'key' => $object->getEpisodeKey(),
            'tv_show' => $object->getTvShow()->getTitle()
        ];
    }

    /**
     * @inheritDoc
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Episode;
    }
}
