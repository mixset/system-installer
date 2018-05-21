<?php

use SystemInstaller\Installer;
use SystemInstaller\InstallerException;
use SystemInstaller\Router;

include_once PARTIALS_PATH . 'header.php';

try {
    // Od PHP7 można zapisać: $step = $_GET['step'] ?? 'start';
    $currentStep = isset($_GET['step']) ? $_GET['step'] : 'start';

    $installer = new Installer();
    $installer->installManager();

    (new Router())->route($currentStep);
} catch (InstallerException $e) {
    echo '<h2 style="text-align:center;">'.$e -> getMessage().'</h2>';
}

include_once PARTIALS_PATH . 'footer.php';
