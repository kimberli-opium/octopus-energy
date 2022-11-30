<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use PDO;

class FileHeaderTypeRepositoryReader extends RepositoryReader
{
    public function select(): array
    {
        $statement = $this->getPdo()->query(
            'SELECT file_id, data_flow_and_version_number, 
                              from_market_participant_role_code, from_market_participant_id, 
                              to_market_participant_role_code, to_market_participant_id, 
                              creation_timestamp, sending_application_id, 
                              receiving_application_id, broadcast, test_data_flag 
                    FROM file_header_type;'
        );

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
