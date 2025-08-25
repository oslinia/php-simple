<?php

use Framework\Facade\Path;

/**
 * @var Path $path
 */

$date = 'year ' . $path->year;

!isset($path->month) || $date .= ', month ' . $path->month;

!isset($path->day) || $date .= ', day ' . $path->day;

ob_start();

?>
        <p>Path: <?= $date ?>.</p>
<?php

$content = ob_get_clean();

require __DIR__ . '/../template/index.php';
