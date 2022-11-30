<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

use PDO;

class MpanCoresRepositoryReader extends RepositoryReader
{
    public function select(): array
    {
        $statement = $this->getPdo()->query(
            'SELECT mpan_core, bsc_validation_status FROM 026_mpan_cores;'
        );

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
