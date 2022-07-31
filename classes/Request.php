<?php

namespace classes;

use Exception;

class Request
{
    public array $path;
    public int $timestampMS;
    public RequestType $type;

    /**
     * @return Request
     * @throws Exception
     */
    static public function instance (): Request
    {
        $request = new self();
        $request->path = explode('/', $_SERVER['REQUEST_URI']);
        $request->timestampMS = (int) $_SERVER['REQUEST_TIME_FLOAT'] * 1000;
        $request->type = self::$supportedTypes[strtolower($_SERVER['REQUEST_METHOD'])];

        return $request;
    }

    static public array $supportedTypes = [
        'get' => RequestType::GET,
        'post' => RequestType::POST,
    ];

    
}

enum RequestType {
    case GET;
    case POST;
}

interface RequestTypeInteface {
    public function getPath();
}