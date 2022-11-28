<?php

namespace OctopusEnergy\TechChallenge;

use PDO;

abstract class RepositoryWriter extends AbstractRepository
{
    private array $data;

    public function __construct(PDO $pdo, array $data)
    {
        parent::__construct($pdo);
        $this->data = $data;
    }

    public function getData(): array
    {
        return $this->data;
    }

    abstract public function insert(): void;
}
