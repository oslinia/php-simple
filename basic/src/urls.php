<?php

namespace Application;

use Framework\Facade\Map;

$map = new Map;

$map->rule('/', 'main');
$map->endpoint('main', Endpoint::class);

$map->rule('/query', 'query');
$map->endpoint('query', Endpoint::class, 'query');

$map->rule('/pages', 'pages');
$map->endpoint('pages', Endpoint::class, 'pages');

$map->rule('/page/{name}.html', 'page')
    ->where(name: '[a-z]+');
$map->endpoint('page', Endpoint::class, 'page');

$map->rule('/redirect', 'redirect');
$map->endpoint('redirect', Endpoint::class, 'redirect');

$map->rule('/medias', 'medias');
$map->endpoint('medias', Endpoint::class, 'medias');

$map->rule('/media/{name}', 'media')
    ->where(name: '[a-z\.]+');
$map->endpoint('media', Endpoint::class, 'media');

$map->rule('/archive', 'archive');
$map->endpoint('archive', Endpoint::class, 'archive');

$map->rule('/archive/{year}', 'archive.data')
    ->where(year: '[0-9]{4}');
$map->rule('/archive/{year}/{month}', 'archive.data')
    ->where(year: '[0-9]{4}', month: '[0-9]{1,2}');
$map->rule('/archive/{year}/{month}/{day}', 'archive.data')
    ->where(year: '[0-9]{4}', month: '[0-9]{1,2}', day: '[0-9]{1,2}');
$map->endpoint('archive.data', Endpoint::class, 'archive_data');
