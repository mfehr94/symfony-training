<?php

declare(strict_types=1);

namespace App\Export;

use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class Exporter
{
    private $repository;
    private $filesystem;
    private $normalizer;
    private $exportDirectory;

    public function __construct(
        ObjectRepository $repository,
        Filesystem $filesystem,
        SerializerInterface $normalizer,
        string $exportDirectory
    ) {
        $this->repository = $repository;
        $this->filesystem = $filesystem;
        $this->normalizer = $normalizer;
        $this->exportDirectory = $exportDirectory;
    }

    public function export(string $fileName): string
    {
        if (!$this->filesystem->exists($this->exportDirectory)) {
            $this->filesystem->mkdir($this->exportDirectory);
        }

        $entities = $this->repository->findAll();

        $filePath = sprintf('%s/%s', $this->exportDirectory, $fileName);
        $handle = fopen($filePath, 'wb');

        foreach ($entities as $entity) {
            fputcsv($handle, $this->normalizer->normalize($entity, 'csv'));
        }

        fclose($handle);

        return $filePath;
    }

    public function supportedEntity(): string
    {
        return $this->repository->getClassName();
    }
}
