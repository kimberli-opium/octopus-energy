<?php

declare(strict_types=1);

namespace OctopusEnergy\TechChallenge;

class CsvDataExporter
{
    public function export(string $file): array
    {
        $data = [];

        $csv = fopen($file, 'rb');
        while (($line = fgetcsv($csv)) !== false) {
            $data[] = $line;
        }
        fclose($csv);

        return $data;
    }
}
