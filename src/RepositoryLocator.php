<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use OctopusEnergy\TechChallenge\Exception\NotSupportedRepositoryTypeException;
use PDO;

class RepositoryLocator
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    private const HEADER_RECORD = 'ZHV';
    private const MPAN_CORES = '026';
    private const METER_READING_TYPES = '028';

    public function locate(array $electricityFlowEntries): RepositoryWriter
    {
        $fileId = (string)$electricityFlowEntries[0][1];

        foreach ($electricityFlowEntries as $electricityFlowEntry) {
            if ($electricityFlowEntry[0] === self::HEADER_RECORD) {
                return new FileHeaderTypeRepositoryWriter($this->pdo, $electricityFlowEntry);
            }
            if ($electricityFlowEntry[0] === self::MPAN_CORES) {
                return new MpanCoresRepositoryWriter($this->pdo, $electricityFlowEntry, $fileId);
            }
            if ($electricityFlowEntry[0] === self::METER_READING_TYPES) {
                return new MeterReadingTypesRepositoryWriter($this->pdo, $electricityFlowEntry, $fileId);
            }
        }

        throw new NotSupportedRepositoryTypeException();
    }
}
