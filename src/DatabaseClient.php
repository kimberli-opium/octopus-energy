<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use PDO;

class DatabaseClient
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

//    public function execute(array $entries): void
//    {
//        foreach ($entries as $entry) {
//            if ($entry[])
//        }
//    }
}
