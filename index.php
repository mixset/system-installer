<?php
session_start();

/**
 * Define URL paths and other constants
*/
define('SRC_PATH', 'src/');
define('CONFIG_PATH', SRC_PATH . 'config/');
define('CORE_PATH', SRC_PATH . 'core/');
define('STEPS_PATH', SRC_PATH . 'steps/');
define('TEMPLATES_PATH', SRC_PATH . 'templates/');
define('PARTIALS_PATH', TEMPLATES_PATH . 'partials/');
define('ASSETS_PATH', TEMPLATES_PATH . 'assets/');

define('APP_PHP', '.php');
define('CONFIG_FILE', 'config.ini');

spl_autoload_register(function ($className) {

    $ds = DIRECTORY_SEPARATOR;
    $dir = __DIR__;

    $className = lcfirst(str_replace('\\', $ds, $className));
    $explode = explode('\\', $className);
    array_shift($explode);
    $path = implode('/', $explode);
    $path = lcfirst($path);

    $file = "{$dir}{$ds}src/{$path}.php";

    if (is_readable($file)) {
        require_once $file;
    }
});

require_once 'vendor/autoload.php';

require_once SRC_PATH . 'index' . APP_PHP;
