<?php

use function Framework\Facade\{query_string, url_for};

ob_start();

?>
        <p>Query string: '<?= query_string() ?>'.</p>
        <ul class="main-nav-list">
            <li><a href="<?= url_for('query') ?>?query=string">query=string</a></li>
        </ul>
<?php

$content = ob_get_clean();

require __DIR__ . '/../template/index.php';
