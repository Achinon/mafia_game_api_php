<?php

namespace collections;

use classes\Tool;
use classes\Tools;

class Lobby extends Collection
{
    private bool $easy_mode;
    private string $code;
    private array $players;

    public function __construct()
    {
        parent::__construct();

        $this->code = Tools::get(Tool::idGenerator)->use();
    }

    public function save()
    {
        // TODO: Implement save() method.
    }

    public static function get()
    {
        // TODO: Implement get() method.
    }
}