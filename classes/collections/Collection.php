<?php

namespace collections;

use classes\Properties;
use classes\Tools;
use Exception;

abstract class Collection
{
    readonly string $id;
    protected object $data;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->id = Tools::generate( Tools::prop(Properties::ID) );
    }
}