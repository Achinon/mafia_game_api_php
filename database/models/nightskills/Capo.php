<?php

namespace nightskills;

use JetBrains\PhpStorm\Pure;
use models\NightSkill;

class Capo extends NightSkill
{
    #[Pure]
    public function execute (): self
    {
        if($this->use()){

        }
        return $this;
    }
}