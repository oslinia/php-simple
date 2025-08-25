<?php

namespace Framework\Foundation\Kernel;

class Url extends Data
{
    private static array $map;

    public static array $request;

    public function __construct(string $file)
    {
        self::$map = require $file;

        self::$request = explode('?', $_SERVER['REQUEST_URI'], 2);
    }

    public static function build(array $args): null|string
    {
        $name = array_shift($args);

        if (isset(self::$map[$name])) {
            $set = self::$map[$name];

            $size = count($args);

            if (isset($set[$size])) {
                [$path, $pattern] = $set[$size];

                foreach ($args as $mask => $value)
                    $path = str_replace('{' . $mask . '}', $value, $path);

                if (preg_match($pattern, $path, $matches))
                    return $matches[0];
            }
        }

        return null;
    }
}
