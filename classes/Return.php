<?php

namespace classes;

use Exception;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\NoReturn;

class Returner
{
    /**
     * @param object|array|string $r
     * @param Response $type
     * @return void
     * @throws Exception
     */
    #[NoReturn]
    public static function respond (object|array|string $r, Response $type = Response::Success):void
    {
        self::headers($type);
        $response['info'] = self::baseResponse($type);
        $response['data'] = $r;

        die(json_encode($response));
    }

    /**
     * @param Response $type
     * @return array
     * @throws Exception
     */
    #[ArrayShape(['success' => "bool", 'timestamp_ms' => "int"])]
    private static function baseResponse (Response $type): array
    {
        return [
            'success' => $type === Response::Success ?? false,
            'timestamp_ms' => Request::instance()->timestampMS
        ];
    }

    /**
     * @param Response $type
     * @return void
     * @throws Exception
     */
    private static function headers (Response $type): void
    {
        if($type === Response::Success)
            header("HTTP/1.1 200 Success");
        elseif($type === Response::Error)
            header("HTTP/1.1 400 Bad Request");
        else {
            header("HTTP/1.1 521 Bad Request");
            throw new Exception('Unknown response type provided by the server;');
        }
    }
}

enum Response {
    case Success;
    case Error;
}