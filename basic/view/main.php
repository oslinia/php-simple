<?php

ob_start()

?>
        <p>Main Page.</p>
<?php

$content = ob_get_clean();

require __DIR__ . '/template/index.php';
