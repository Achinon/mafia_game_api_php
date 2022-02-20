<?php

namespace classes;

use Exception;
use JetBrains\PhpStorm\Pure;
use tools\idGen;

class Tools
{
    private static function idGenerator () {

    }


    public static function get (Tool $tool): mixed
    {
        return match ($tool) {
            Tool::idGenerator => idGen::construct()
        };
    }

    static public function php () {
        echo '<pre>';
        var_dump($_SERVER);
        echo '</pre>';
    }
}

enum Tool {
    case idGenerator;
}

namespace tools;

use classes\Tool;
use JetBrains\PhpStorm\Pure;

abstract class ToolProp {
    public Tool $type;
    abstract public static function construct ();
    abstract public function use ();
}

class idGen extends ToolProp {
    public int $length = 21;
    public bool $hex = false;

    #[Pure]
    public static function construct(): idGen
    {
        $idGen = new self();
        $idGen->type = Tool::idGenerator;
        return $idGen;
    }

    public function use() : string
    {
        $characters = $this->hex ?
            '0123456789abcdef':
            '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $this->length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
};