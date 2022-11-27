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

    public function locate(array $electricityFlowEntries): ElectricityFlowRepository
    {
        foreach ($electricityFlowEntries as $electricityFlowEntry) {
            if ($electricityFlowEntry[0] === self::HEADER_RECORD) {
                return new FileHeaderTypeRepository($this->pdo, $electricityFlowEntry);
            }
        }

        throw new NotSupportedRepositoryTypeException();
    }
}
