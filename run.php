<?php

use OctopusEnergy\TechChallenge\Factory;

require __DIR__ . '/vendor/autoload.php';

$factory = new Factory();
$service = $factory->createImportService(__DIR__.'/data.csv');

$service->run();
