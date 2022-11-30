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
    private const REGISTER_READINGS = '030';

    public function locate(array $electricityFlowEntry, string $fileId): RepositoryWriter
    {
        switch ((string)$electricityFlowEntry[0]) {
            case self::HEADER_RECORD:
                return new FileHeaderTypeRepositoryWriter($this->pdo, $electricityFlowEntry);
            case self::MPAN_CORES:
                return new MpanCoresRepositoryWriter($this->pdo, $electricityFlowEntry, $fileId);
            case self::METER_READING_TYPES:
                return new MeterReadingTypesRepositoryWriter($this->pdo, $electricityFlowEntry, $fileId);
            case self::REGISTER_READINGS:
                return new RegisterReadingsRepositoryWriter($this->pdo, $electricityFlowEntry, $fileId);
            default:
                throw new NotSupportedRepositoryTypeException();
        }
    }
}
