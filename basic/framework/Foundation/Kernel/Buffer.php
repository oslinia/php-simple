<?php

namespace Framework\Foundation\Kernel;

class Buffer
{
    public static array $buffer;

    public function media_exists(): bool
    {
        return self::$buffer['bool'] = is_file(self::$buffer['file']);
    }

    public function file(): string
    {
        return self::$buffer['file'];
    }

    public function file_exists(): bool
    {
        return is_file(self::$buffer['file']);
    }

    public function buffer(array|null $context): void
    {
        self::$buffer['context'] = $context ?? [];
    }
}
