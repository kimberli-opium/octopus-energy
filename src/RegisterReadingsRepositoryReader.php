<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use PDO;

class RegisterReadingsRepositoryReader extends RepositoryReader
{
    public function select(): array
    {
        $statement = $this->getPdo()->query(
            'SELECT meter_register_id, reading_timestamp, 
                            register_reading, md_reset_timestamp, number_of_md_resets, 
                            meter_reading_flag, reading_method FROM 030_register_readings;'
        );

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
