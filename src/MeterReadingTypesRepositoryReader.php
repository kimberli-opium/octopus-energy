<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use PDO;

class MeterReadingTypesRepositoryReader extends RepositoryReader
{
    public function select(): array
    {
        $statement = $this->getPdo()->query(
            'SELECT serial_number, reading_type FROM 028_meter_reading_types;'
        );

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
