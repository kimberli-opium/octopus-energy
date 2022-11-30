<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use PDO;

class MpanCoresRepositoryWriter extends RepositoryWriter
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
            'INSERT INTO 026_mpan_cores (
                              mpan_core, bsc_validation_status, file_id
                              ) VALUES (:mpanCore, :bscValidationStatus,:fileId)'
        );

        $mpanCores = $this->getData();

        $statement->execute([
            'mpanCore' => (float)$mpanCores[1],
            'bscValidationStatus' => $mpanCores[2],
            'fileId' => $this->fileId,
        ]);
    }
}
