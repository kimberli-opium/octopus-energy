<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use PDO;

class PdoBuilder
{
    private string $host;

    private string $username;

    private string $password;

    private string $database;

    private string $encoding;

    private int $port;

    private array $options;

    public function __construct(
        string $host,
        string $username,
        string $password,
        string $database,
        string $encoding,
        int $port,
        array $options
    ) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
        $this->encoding = $encoding;
        $this->port = $port;
        $this->options = $options;
    }

    public function buildPdo(): PDO
    {
        return new PDO(
            $this->buildDsn(),
            $this->username,
            $this->password,
            $this->options
        );
    }

    private function buildDsn(): string
    {
        return sprintf('mysql:host=%s;charset=%s;port=%u;dbname=%s', $this->host, $this->encoding, $this->port, $this->database);
    }
}
