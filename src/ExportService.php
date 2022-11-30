<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use PDO;

class ExportService
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function exportFileHeader(): array
    {
        return (new FileHeaderTypeRepositoryReader($this->pdo))->select();
    }

    public function exportMpanCores(): array
    {
        return (new MpanCoresRepositoryReader($this->pdo))->select();
    }

//    public function exportMeterReadingTypes(): array
//    {
//        return (new MpanCoresRepositoryReader($this->pdo))->select();
//    }
}
