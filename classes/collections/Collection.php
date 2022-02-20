<?php

namespace collections;

use classes\Tool;
use classes\Tools;

abstract class Collection
{
    readonly string $id;

    public function __construct()
    {
        $this->id = Tools::get(Tool::idGenerator)->use();
    }

    abstract public function save();
    abstract public static function get();
}