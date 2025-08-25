<?php

ob_start();

?>
        <p>Pages: name page.</p>
<?php

$content = ob_get_clean();

require __DIR__ . '/../template/index.php';
