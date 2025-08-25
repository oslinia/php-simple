<?php

use function Framework\Facade\url_for;

$now = (new \DateTime)->setTimezone(new \DateTimeZone('UTC'));

$date = $now->format('Y/m/d');

[$year, $month, $day] = explode('/', $date);

$href_year = url_for('archive.data', year: $year);
$href_year_month = url_for('archive.data', year: $year, month: $month);
$href_year_month_day = url_for('archive.data', year: $year, month: $month, day: $day);

ob_start()

?>
        <p>Date: <?= $date ?></p>
        <ul class="main-nav-list">
            <li><a href="<?= $href_year ?>"><?= '/archive/' . $year ?></a></li>
            <li><a href="<?= $href_year_month ?>"><?= '/archive/' . $year . '/' . $month ?></a></li>
            <li><a href="<?= $href_year_month_day ?>"><?= '/archive/' . $year . '/' . $month . '/' . $day ?></a></li>
        </ul>
<?php

$content = ob_get_clean();

require __DIR__ . '/../template/index.php';
