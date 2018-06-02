<?php

use SystemInstaller\Core\Installer;
use SystemInstaller\Core\Router;
use SystemInstaller\Exceptions\InstallerException;

include_once PARTIALS_PATH . 'header.php';

try {
    // Od PHP7 można zapisać: $step = $_GET['step'] ?? 'start';
    $currentStep = isset($_GET['step']) ? $_GET['step'] : 'start';

    $installer = new Installer();
    $installer->installManager();

    (new Router())->route($currentStep);
} catch (Exception $e) {
    echo '<p style="text-align: center">Error occured. Check error logs for more details.</p>';
    error_log($e -> getMessage());
}

include_once PARTIALS_PATH . 'footer.php';
