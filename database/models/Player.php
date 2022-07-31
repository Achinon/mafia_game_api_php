<?php

namespace collections;

use collection\Collection;
use JetBrains\PhpStorm\ArrayShape;
use Player\LastAction;

class Player
{
    private PlayerState $location = PlayerState::Disconnected;
    private LastAction $lastAction;
    readonly string $job;
    readonly Player $selectedPlayer;
    readonly string $name;

    public function __construct()
    {

    }

    public function __call($name, $arguments)
    {
        $this->lastAction = new LastAction($name, $arguments);
    }

    public function selectPlayer(Player $player): static
    {
        $this->selectedPlayer = $player;
        return $this;
    }

    /**
     * @param string $name
     * @return Player
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function prepareForInsert(): array
    {
        return [
            'name' => $this->name,
            'job' => 'test'
        ];
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public static function get(string $id)
    {
        // TODO: Implement get() method.
    }

    public static function create()
    {
        // TODO: Implement create() method.
    }
}

enum PlayerState {
    case Disconnected;
    case InLobby;
    case InGame;
}

namespace Player;

use classes\tool\Tool;
use classes\tool\Tools;

class LastAction {
    public string $method;
    public array $arguments;
    public int $timestampMs;

    public function __construct($name, $arguments)
    {
        $this->method = $name;
        $this->arguments = $arguments;
        $this->timestampMs = Tool::get(Tools::timestamp)->use();
    }
}