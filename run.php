<?php

use OctopusEnergy\TechChallenge\Factory;

require __DIR__ . '/vendor/autoload.php';

$factory = new Factory();
$importService = $factory->createImportService(__DIR__.'/data.csv');
$importService->run();
