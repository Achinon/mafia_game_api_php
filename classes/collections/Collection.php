<?php

namespace collections;

use classes\Tool;
use classes\Tools;

abstract class Collection
{
    readonly string $id;

    public function __construct()
    {
        $generator = Tools::get(Tool::idGenerator);
        $generator->length = 5;

        $this->id = $generator->use();
    }

    abstract public function save();
    abstract public static function get(string $id);
}