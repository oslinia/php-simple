<?php

namespace Framework\Facade;

use Framework\Foundation\Kernel\Process;

use function Framework\Foundation\buffer;

function media_exists(string $name): bool
{
    return is_file(Process::root('resource', 'media', $name));
}

function render_media(string $name, null|string $encoding = null): array
{
    $render = Process::render('resource', 'media', $name);

    if ($render->media_exists())
        return [$render->file(), $encoding];

    return ['File not found', 404, null, 'ASCII'];
}

function template_exists(string $name): bool
{
    return is_file(Process::root('view', $name));
}

function render_template(
    string      $name,
    array|null  $context = null,
    int|null    $code = null,
    null|string $mimetype = null,
    null|string $encoding = null,
): array {
    $render = Process::render('view', $name);

    if ($render->file_exists()) {
        $render->buffer($context);

        return [buffer(), $code, $mimetype ?? 'text/html', $encoding];
    }

    return ['Template not found', 500, null, 'ASCII'];
}

class Rendering extends Factory
{
    public function media_exists(string $name): bool
    {
        return is_file(Process::root('resource', 'media', $name));
    }

    public function render_media(string $name, null|string $encoding = null): array
    {
        $render = Process::render('resource', 'media', $name);

        if ($render->media_exists())
            return [$render->file(), $encoding];

        return ['File not found', 404, null, 'ASCII'];
    }

    public function template_exists(string $name): bool
    {
        return is_file(Process::root('view', $name));
    }

    public function render_template(
        string      $name,
        array|null  $context = null,
        int|null    $code = null,
        null|string $mimetype = null,
        null|string $encoding = null,
    ): array {
        $render = Process::render('view', $name);

        if ($render->file_exists()) {
            $render->buffer($context);

            return [buffer(), $code, $mimetype ?? 'text/html', $encoding];
        }

        return ['Template not found', 500, null, 'ASCII'];
    }
}
