<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

class ImportService
{
    private string $file;
    private CsvDataExporter $csvDataExporter;
    private RepositoryLocator $repositoryLocator;

    public function __construct(
        string $file,
        CsvDataExporter $csvDataExporter,
        RepositoryLocator $repositoryLocator
    ) {
        $this->file = $file;
        $this->csvDataExporter = $csvDataExporter;
        $this->repositoryLocator = $repositoryLocator;
    }

    public function run(): void
    {
        $electricityFlowEntries = $this->csvDataExporter->export($this->file);

        foreach ($electricityFlowEntries as $electricityFlowEntry) {
            $fileId = (string)$electricityFlowEntries[0][1];

            $repository = $this->repositoryLocator->locate($electricityFlowEntry, $fileId);
            $repository->insert();
        }
    }
}
