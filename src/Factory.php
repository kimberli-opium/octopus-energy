<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use OctopusEnergy\TechChallenge\Exception\EnvironmentVariableException;
use PDO;

class Factory
{
    private const DATABASE_ENCODING = 'utf8';

    private static function getEnvironmentVariable(string $name)
    {
        $value = getenv($name);
        if ($value === false) {
            $message = sprintf('Expected Environment Variable "%s" to be available', $name);
            throw new EnvironmentVariableException($message);
        }

        return $value;
    }

    public function createImportService(string $file): ImportService
    {
        return new ImportService(
            $file,
            $this->createCsvDataExporter(),
            $this->createRepositoryLocator()
        );
    }

    private function createCsvDataExporter(): CsvDataExporter
    {
        return new CsvDataExporter();
    }

    private function createRepositoryLocator(): RepositoryLocator
    {
        return new RepositoryLocator($this->getDatabaseConnection());
    }

    private function getDatabaseConnection(): PDO
    {
        $pdoBuilder = new PdoBuilder(
            self::getEnvironmentVariable(EnvironmentVariableNames::DATABASE_HOSTNAME),
            self::getEnvironmentVariable(EnvironmentVariableNames::DATABASE_USERNAME),
            self::getEnvironmentVariable(EnvironmentVariableNames::DATABASE_PASSWORD),
            self::getEnvironmentVariable(EnvironmentVariableNames::DATABASE_DATABASE_NAME),
            self::DATABASE_ENCODING,
            (int) self::getEnvironmentVariable(EnvironmentVariableNames::DATABASE_PORT),
            [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]
        );

        return $pdoBuilder->buildPdo();
    }

    public function createExportService(): ExportService
    {
        return new ExportService($this->getDatabaseConnection());
    }
}
