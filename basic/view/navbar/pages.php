<?php

use function Framework\Facade\url_for;

ob_start();

?>
        <ul class="main-nav-list">
            <li><a href="<?= url_for('page', name: 'name') ?>">name page</a></li>
            <li><a href="<?= url_for('page', name: 'error') ?>">error page</a></li>
        </ul>
<?php

$content = ob_get_clean();

require __DIR__ . '/../template/index.php';
