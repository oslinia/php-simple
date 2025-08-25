<?php

namespace Application;

use Framework\Facade\{Path,  Rendering};

class Endpoint extends Rendering
{
    public function __invoke(): array
    {
        return parent::render_template('main.php');
    }

    public function query(): array
    {
        return parent::render_template('navbar/query.php');
    }

    public function pages(): array
    {
        return parent::render_template('navbar/pages.php');
    }

    public function page(Path $path): array
    {
        $template = 'page/' . $path->name . '.php';

        if (parent::template_exists($template))
            return parent::render_template($template);

        return parent::render_template('template/error.php', code: 404);
    }

    public function redirect(): array
    {
        return parent::redirect_response(parent::url_for('page', name: 'name'));
    }

    public function medias(): array
    {
        return parent::render_template('navbar/medias.php');
    }

    public function media(Path $path): array
    {
        $file = $path->name;

        if (parent::media_exists($file))
            return parent::render_media($file, 'ASCII');

        return $this->base_response('File Not Found', 404, encoding: 'ASCII');
    }

    public function archive(): array
    {
        return parent::render_template('navbar/archive.php');
    }

    public function archive_data(Path $path): array
    {
        return parent::render_template('archive/date.php', ['path' => $path], encoding: 'ASCII');
    }
}
