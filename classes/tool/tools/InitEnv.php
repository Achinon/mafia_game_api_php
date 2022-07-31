<?php

namespace tools;

use Dotenv\Dotenv;

class InitEnv extends  ToolsBase
{
    public function use()
    {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }
}