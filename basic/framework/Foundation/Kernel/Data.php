<?php

namespace Framework\Foundation\Kernel;

class Data
{
    public static array $data;

    private function default(string $file): void
    {
        $f = fopen($file, 'w');

        fwrite($f, '<?php return ' . var_export([
            'public' => '/static/',
        ], true) . ';');

        fclose($f);
    }

    public function __construct(string $file)
    {
        is_file($file) || $this->default($file);

        self::$data = require $file;
    }
}
