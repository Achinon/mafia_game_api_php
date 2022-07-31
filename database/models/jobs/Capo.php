<?php

namespace jobs;

use faction\Mafia;
use models\Factions;
use models\Job;

class Capo extends Job
{
    const NAME = 'Capo';
    public static Factions $faction = Factions::Mafia;
    public static bool $canKill = true;

    public function __construct() {

    }

    public function nightSkill()
    {
        // TODO: Implement nightSkill() method.
    }
}