<?php
declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

class ImportService
{
    private string $file;
    private CsvDataExporter $csvDataExporter;

    public function __construct(string $file, CsvDataExporter $csvDataExporter)
    {
        $this->file = $file;
        $this->csvDataExporter = $csvDataExporter;
    }

    public function run(): void
    {
       $this->csvDataExporter->export($this->file);
    }
}
