<?php

ob_start()

?>
        <p>Error 404. Page Not Found.</p>
<?php

$content = ob_get_clean();

require __DIR__ . '/index.php';
