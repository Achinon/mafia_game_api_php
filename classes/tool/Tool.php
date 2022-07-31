<?php

namespace classes\tool;

use Cassandra\Time;
use tools\idGenerator;
use tools\InitEnv;
use tools\ParseDump;
use tools\phpInfo;
use tools\Timestamp;

class Tool
{
    private static idGenerator $generator;
    private static phpInfo $phpInfo;
    private static InitEnv $initEnv;
    private static ParseDump $parseDump;
    private static Timestamp $timestamp;

    public static function get(Tools $tool)
    {
        self::prepare();

        return match ($tool){
            Tools::idGenerator => self::$generator,
            Tools::phpInfo => self::$phpInfo,
            Tools::initEnv => self::$initEnv,
            Tools::parseDump => self::$parseDump,
            Tools::timestamp => self::$timestamp
        };
    }

    private static function prepare (): void
    {
        self::$generator = new idGenerator();
        self::$phpInfo = new phpInfo();
        self::$initEnv = new InitEnv();
        self::$parseDump = new ParseDump();
        self::$timestamp = new Timestamp();
    }
}

enum Tools
{
    case idGenerator;
    case phpInfo;
    case initEnv;
    case parseDump;
    case timestamp;
}