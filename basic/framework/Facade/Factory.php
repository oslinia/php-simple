<?php

namespace Framework\Facade;

use Framework\Foundation\Kernel\Url;

function path_info(): string
{
    return Url::$request[0];
}

function query_string(): string
{
    return Url::$request[1] ?? '';
}

function url_for(string ...$args): string
{
    return Url::build($args) ?? '';
}

function url_path(string $name): string
{
    return Url::$data['public'] . $name;
}

function base_response(
    string $body,
    int|null $code = null,
    null|string $mimetype = null,
    null|string $encoding = null,
): array {
    return [$body, $code, $mimetype, $encoding];
}

function redirect_response(string $url, int $code = 307): array
{
    header('Location: ' . $url);

    return ['', $code, null, null];
}

class Factory
{
    public function path_info(): string
    {
        return Url::$request[0];
    }

    public function query_string(): string
    {
        return Url::$request[1] ?? '';
    }

    public function url_for(string ...$args): null|string
    {
        return Url::build($args);
    }

    public function url_path(string $name): string
    {
        return Url::$data['public'] . $name;
    }

    public function base_response(
        string $body,
        int|null $code = null,
        null|string $mimetype = null,
        null|string $encoding = null,
    ): array {
        return [$body, $code, $mimetype, $encoding];
    }

    public function redirect_response(string $url, int $code = 307): array
    {
        header('Location: ' . $url);

        return ['', $code];
    }
}
