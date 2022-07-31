<?php

namespace database;

use MongoDB\Client;

class Database
{
    const name = 'mafia';

    private static function getLocalUrl (): string
    {
        return "mongodb://localhost:27017";
    }

    protected static function getDatabase (): \MongoDB\Database
    {
        return self::getClient()->selectDatabase(self::name);
    }

    protected static function getClient (): Client
    {
        return new Client(static::getLocalUrl());
    }

    public static function actions (): \MongoDB\Model\DatabaseInfoIterator
    {
        return self::getClient()->listDatabases();
//        self::getClient()->selectDatabase()
    }
}