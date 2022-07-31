<?php

namespace models;

class Faction
{

}

enum Factions implements FactionRules {
    case Mafia;
    case Town;
    case Neutral;

    public function getCount(int $playerCount): int
    {
        $townCount = round($playerCount*0.73);
        $notTownCount = $playerCount - $townCount;
        $mafiaCount = round($notTownCount*0.75);
        $neutralCount = $notTownCount - $mafiaCount;

        return match ($this) {
            self::Mafia => $mafiaCount,
            self::Town => $townCount,
            self::Neutral => $neutralCount
        };
    }

    public function getPriority(): int
    {
        return match ($this){
            self::Mafia => 2,
            self::Town => 1,
            self::Neutral => 3,
        };
    }
}

interface FactionRules {
    public function getCount(int $playerCount);
    public function getPriority();
}
