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

function __autoload($className)
{
    $className = explode('\\', $className);
    $className = array_pop($className);

    require_once CORE_PATH . $className . APP_PHP;
}

require_once SRC_PATH . 'index' . APP_PHP;
