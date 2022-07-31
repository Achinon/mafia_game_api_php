<?php

namespace database;

use models\Factions;

class Game
{
    public int $playerCount;
    public int $townCount;
    public int $mafiaCount;
    public int $neutralCount;

    private function countFactions () {
        $c = $this->playerCount;

        $this->townCount = Factions::Town->getCount($c);
        $this->mafiaCount = Factions::Mafia->getCount($c);
        $this->neutralCount = Factions::Neutral->getCount($c);
    }
}