<?php

namespace collections;

class Lobby extends Collection
{
    private bool $easy_mode;
    private array $players;

    public function __construct()
    {
        parent::__construct();
    }

    public static function create (): Lobby
    {
        $lobby = new self();
        $lobby->easy_mode = false;
        $lobby->players = [];

        return $lobby;
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public static function get(string $id): Lobby
    {
        // TODO: Implement get() method.
//        $lobbyData = database:lobby:get($id)
        $lobbyData = (object)[
            'easy_mode' => false,
            'players' => [
                'id1',
                'id2',
            ]
        ];

        $lobby = new self();
        $lobby->easy_mode = $lobbyData->easy_mode;
        $lobby->players = $lobbyData->players;
        return $lobby;
    }
}