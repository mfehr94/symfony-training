<?php

declare(strict_types=1);

namespace App\Export;

class Gateway
{
    /**
     * @var Exporter[]
     */
    private $exporters;

    /**
     * @param Exporter[] $exporters
     */
    public function __construct(iterable $exporters)
    {
        foreach ($exporters as $exporter) {
            $this->exporters[$exporter->supportedEntity()] = $exporter;
        }
    }

    public function supports(string $entityClassName): bool
    {
        return array_key_exists($entityClassName, $this->exporters);
    }

    public function export(string $entityClassName, string $fileName): string
    {
        if (!$this->supports($entityClassName)) {
            throw new \InvalidArgumentException(
                sprintf('Entity class "%s" is not supported for export', $entityClassName)
            );
        }

        return $this->exporters[$entityClassName]->export($fileName);
    }
}
