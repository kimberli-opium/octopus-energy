<?php

namespace OctopusEnergy\TechChallenge;

use PDO;

abstract class ElectricityFlowRepository
{
    private PDO $pdo;
    private array $data;

    public function __construct(PDO $pdo, array $data)
    {
        $this->pdo = $pdo;
        $this->data = $data;
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }

    public function getData(): array
    {
        return $this->data;
    }

    abstract public function insert(): void;
}
