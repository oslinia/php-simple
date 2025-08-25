<?php

use function Framework\Facade\{path_info, url_for, url_path};

$path_info = path_info();

$url_main = url_for('main');

$nav_list = '';

foreach (
    [
        url_for('archive') => 'Archive',
        url_for('medias') => 'Medias',
        url_for('redirect') => 'Redirect',
        url_for('pages') => 'Pages',
        url_for('query') => 'Query',
    ] as $url_href => $name
) {
    $bool = $path_info == $url_href;

    $nav_list .= '
                    <li class="nav-item"><a class="nav-link' . (
        $bool ? ' active' : ''
    ) . '"' . (
        $bool ? ' aria-current="page"' : ''
    ) . ' href="' . $url_href . '">' . $name . '</a></li>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Basic Application</title>
    <link href="<?= url_path('bootstrap/min.css') ?>" rel="stylesheet">
    <link href="<?= url_path('src/style.css') ?>" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-md bg-tertiary" aria-label="Ninth navbar example">
        <div class="container-md">
            <?= $path_info === $url_main ?
                '<span class="navbar-brand" style="cursor: default;">Basic</span>' . PHP_EOL
                :
                '<a class="navbar-brand" href="' . $url_main . '">Basic</a>' . PHP_EOL ?>
            <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse" data-bs-target="#navbar-collapse"
                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0"><?= $nav_list . PHP_EOL ?>
                </ul>
                <span class="navbar-login"><a href="<?= url_for('main') ?>">Sign in</a></span>
            </div>
        </div>
    </nav>
    <div class="container-md"><?= PHP_EOL . $content ?>
    </div>
    <script src="<?= url_path('bootstrap/bundle.min.js') ?>"></script>
</body>
</html>