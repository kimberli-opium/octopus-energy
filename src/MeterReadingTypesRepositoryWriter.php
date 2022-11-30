<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use PDO;

class MeterReadingTypesRepositoryWriter extends RepositoryWriter
{
    private string $fileId;

    public function __construct(PDO $pdo, array $data, string $fileId)
    {
        parent::__construct($pdo, $data);
        $this->fileId = $fileId;
    }

    public function insert(): void
    {
        $statement = $this->getPdo()->prepare(
            'INSERT INTO 028_meter_reading_types (
                              serial_number, reading_type, file_id
                              ) VALUES (:serialNumber, :readingType,:fileId)'
        );

        $meterReadingTypes = $this->getData();

        $statement->execute([
            'serialNumber' => $meterReadingTypes[1],
            'readingType' => $meterReadingTypes[2],
            'fileId' => $this->fileId,
        ]);
    }
}
