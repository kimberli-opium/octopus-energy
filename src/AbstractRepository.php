<?php

namespace OctopusEnergy\TechChallenge;

use PDO;

abstract class AbstractRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}
