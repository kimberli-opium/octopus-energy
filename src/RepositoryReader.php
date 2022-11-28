<?php
declare(strict_types=1);


namespace OctopusEnergy\TechChallenge;

abstract class RepositoryReader extends AbstractRepository
{
    abstract public function select(): array;
}
