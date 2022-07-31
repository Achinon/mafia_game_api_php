<?php

namespace models;

use collections\Player;

class NightSkill
{
    readonly int $usesLeft;
    readonly NightSkillPriority $priority;

    protected function use(): bool
    {
        if($this->usesLeft === 0)
            return false;
        return true;
    }
}