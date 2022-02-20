<?php

namespace classes;

use Exception;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\NoReturn;

class Response
{
    /**
     * @param object|array|string $r
     * @param ResponseType $type
     * @return void
     * @throws Exception
     */
    #[NoReturn]
    public static function send (object|array|string $r, ResponseType $type = ResponseType::Success):void
    {
        self::headers($type);
        $response['info'] = self::baseResponse($type);
        $response['data'] = $r;

        die(json_encode($response));
    }

    /**
     * @param ResponseType $type
     * @return array
     * @throws Exception
     */
    #[ArrayShape(['success' => "bool", 'timestamp_ms' => "int"])]
    private static function baseResponse (ResponseType $type): array
    {
        return [
            'success' => $type === ResponseType::Success ?? false,
            'timestamp_ms' => Request::instance()->timestampMS
        ];
    }

    /**
     * @param ResponseType $type
     * @return void
     * @throws Exception
     */
    private static function headers (ResponseType $type): void
    {
        if($type === ResponseType::Success)
            header("HTTP/1.1 200 Success");
        elseif($type === ResponseType::Error)
            header("ResponseType/1.1 400 Bad Request");
        else {
            header("HTTP/1.1 521 Bad Request");
            throw new Exception('Unknown response type provided by the server;');
        }
    }
}

enum ResponseType {
    case Success;
    case Error;
}