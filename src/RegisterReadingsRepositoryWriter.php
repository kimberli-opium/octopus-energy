<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use PDO;

class RegisterReadingsRepositoryWriter extends RepositoryWriter
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
            'INSERT INTO 030_register_readings (
                                meter_register_id, reading_timestamp, 
                                register_reading,md_reset_timestamp, 
                                number_of_md_resets, meter_reading_flag, 
                                reading_method, file_id
                              ) VALUES (:meterRegisterId, :readingTimestamp, 
                                :registerReading, :mdResetTimestamp, 
                                :numberOfMdResets, :meterReadingFlag, 
                                :readingMethod, :fileId)'
        );

        $registerReadings = $this->getData();

        $statement->execute([
            'meterRegisterId' => $registerReadings[1],
            'readingTimestamp' => $registerReadings[2],
            'registerReading' => $registerReadings[3],
            'mdResetTimestamp' => empty($registerReadings[4]) ? null : $registerReadings[4],
            'numberOfMdResets' => empty($registerReadings[5]) ? null : $registerReadings[5],
            'meterReadingFlag' => empty($registerReadings[6]) ? null : $registerReadings[6],
            'readingMethod' => $registerReadings[7],
            'fileId' => $this->fileId,
        ]);
    }
}
