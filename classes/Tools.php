<?php

namespace classes;

use Exception;
use JetBrains\PhpStorm\Pure;

class Tools
{
    /**
     * @throws Exception
     */
    public static function generate (Prop $prop): mixed
    {
        return match ($prop->type) {
            Properties::ID => self::id($prop->data),
            default => $prop, //should be grey, if not, you messed up...
        };
    }

    /**
     * @throws Exception
     */
    private static function id(object $prop) : string
    {
        if($prop->type === Properties::ID){
            $characters = $prop->hex ?
                '0123456789abcdef':
                '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';

            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $prop->id; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
        throw new Exception('Illegal prop access');
    }

    /**
     * @throws Exception
     */
    public static function prop (Properties $property): Prop
    {
        return match ($property) {
            Properties::ID => Prop::construct (
                Properties::ID,
                new class {
                    public int $length = 21;
                    public bool $hex = false;
                }
            ),
            default => throw new Exception('Unknown type of property provided'),  //should be grey, if not, you f'd up...
        };
    }
}

class Prop {
    public Properties $type;
    public object $data;

    #[Pure]
    public static function construct(Properties $property, object $data): Prop
    {
        $prop = new self();
        $prop->type = $property;
        $prop->data = $data;

        return $prop;
    }
}

enum Properties {
    case ID;
}