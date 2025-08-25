<?php

use function Framework\Facade\url_for;

ob_start();

?>
        <ul class="main-nav-list">
            <li><a href="<?= url_for('media', name: 'style.css') ?>" target="_blank">style.css</a></li>
            <li><a href="<?= url_for('media', name: 'not.file') ?>">not file</a></li>
        </ul>
<?php

$content = PHP_EOL . ob_get_clean();

require __DIR__ . '/../template/index.php';
