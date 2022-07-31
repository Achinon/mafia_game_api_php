<?php

namespace collections;

use classes\tool\Tool;
use classes\tool\Tools;
use collection\Collection;
use collection\Collections;
use JetBrains\PhpStorm\ArrayShape;
use Lobby\IdType;

class Lobby extends Collection
{
    protected static Collections $collection = Collections::Lobbies;
    public bool $easy_mode;
    public string $friendly_name;
    public array $players;

    public function __construct()
    {
        parent::__construct();
    }

    public static function join (Player $player, string $name)
    {
        $playerData = $player->prepareForInsert();

        $lobby = self::getBy(IdType::name, $name);

        $lobby->players[] = $playerData;
        $lobby->save();

        return $lobby;
    }

    public static function create (): Lobby
    {
        $lobby = new self();
        $lobby->easy_mode = false;
        $lobby->players = [];
        $lobby->friendly_name = Tool::get(Tools::idGenerator)
            ->setLength(5)
            ->setHex(false)
            ->use();

        $lobby->friendly_name = strtoupper($lobby->friendly_name);

        self::getCollection()
            ->insertOne([
                '_id' => $lobby->id,
                'easy_mode' => $lobby->easy_mode,
                'friendly_name' => $lobby->friendly_name,
                'players' => []
            ]);

        return $lobby;
    }

    public function save(): self
    {
        self::getCollection()
            ->findOneAndReplace(
                ['_id' => $this->id],
                $this->prepareForInsert());

        return $this;
    }

    #[ArrayShape(['_id' => "int|string|void", 'easy_mode' => "bool", 'friendly_name' => "string", 'players' => "array"])]
    private function prepareForInsert (): array
    {
        return [
            '_id' => $this->id,
            'easy_mode' => $this->easy_mode,
            'friendly_name' => $this->friendly_name,
            'players' => $this->players
        ];
    }

    public static function getBy(IdType $type, $name): Lobby
    {
        return match ($type) {
            IdType::name => self::get('friendly_name', $name),
            IdType::_id => self::get('_id', $name),
        };
    }

    protected static function get(string $key, string $value): Lobby
    {
        $lobby = (array)self::getCollection()->findOne([$key => $value]);

        $instance = new self();
        $instance->id = $lobby['_id'];
        $instance->easy_mode = $lobby['easy_mode'];
        $instance->friendly_name = $lobby['friendly_name'];
        $instance->players = (array)$lobby['players'];
//        $instance->players = $lobby->players;

        return $instance;
    }

    public static function getAll ()
    {
        return self::getCollection();
    }

    public static function new()
    {
        // TODO: Implement new() method.
    }
}

namespace Lobby;

enum IdType {
    case _id;
    case name;
}