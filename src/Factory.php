<?php
declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

class Factory
{
    public function createImportService(string $file): ImportService
    {
        return new ImportService(
            $file,
            $this->createCsvDataExporter()
        );
    }

    private function createCsvDataExporter(): CsvDataExporter
    {
        return new CsvDataExporter();
    }
}
