<?php

namespace collection;

use classes\tool\Tool;
use classes\tool\Tools;
use database\Database;

abstract class Collection extends Database
{
    protected string $id;
    protected static Collections $collection;
    abstract public function save();
    abstract public static function create();
    abstract protected static function get(string $key, string $val);

    public function __construct()
    {
        $this->id = Tool::get(Tools::idGenerator)
            ->setLength(16)
            ->setHex(true)
            ->use();
    }

    protected static function getCollection (): \MongoDB\Collection
    {
        $collectionString = self::getCollectionString(static::$collection);

        return self::getDatabase()->selectCollection($collectionString);
    }

    private static function getCollectionString (Collections $collection): string
    {
        return match ($collection) {
            Collections::Players => 'players',
            Collections::Lobbies => 'lobbies',
        };
    }
}

enum Collections {
    case Lobbies;
    case Players;
}