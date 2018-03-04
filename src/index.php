<?php

include_once PARTIALS_PATH . 'header.php';

try {
    // Od PHP7 można zapisać: $step = $_GET['step'] ?? 'start';
    $step = isset($_GET['step']) ? $_GET['step'] : 'start';

    $installer = new Installer\Installer();
    $installer->installManager();

    (new Router())->route($step);
} catch(Exception $e) {
    echo '<h2 style="text-align:center;">'.$e -> getMessage().'</h2>';
}

include_once PARTIALS_PATH . 'footer.php';
