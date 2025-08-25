<?php

namespace Framework\Foundation\Kernel;

use Framework\Foundation\Mapping\Mapper;

class Process extends Buffer
{
    private static string $root;

    public function __construct(string $dirname)
    {
        self::$root = $dirname . DIRECTORY_SEPARATOR;

        new Data(self::root('resource', 'data.php'));

        parent::$buffer = ['bool' => false];
    }

    public function __invoke()
    {
        $callback = new Mapper(
            self::root('resource', 'mapping'),
            self::root('src', 'urls.php'),
        );

        new Url(self::root('resource', 'mapping', 'map.php'));

        return $callback(Url::$request[0]);
    }

    public static function root(string ...$args): string
    {
        return self::$root . implode(DIRECTORY_SEPARATOR, $args);
    }

    public static function render(string ...$args): object
    {
        parent::$buffer['file'] = self::root(...$args);

        return new Buffer;
    }
}
