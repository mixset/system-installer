<?php

namespace SystemInstaller\Core;

use SystemInstaller\Dictionary\StepDictionary;

require_once STEPS_PATH . 'StepInterface' . APP_PHP;
require_once STEPS_PATH . 'Step' . APP_PHP;

/**
 * Class Installer
 * @package Installer
*/
class Installer
{
    /**
     * Steps of install form
     *
     * @var array
    */
    public $steps = [];

    /**
     * Installer constructor.
    */
    public function __construct()
    {
        $this->initFile();
        $this->loadSteps();
    }

    /**
     * Load array with steps of installer
    */
    public function loadSteps()
    {
        $this->steps = (new StepDictionary())->steps;
    }

    /**
     * Perform save action of given class from current step
     *
     * @return mixed
    */
    public function installManager()
    {
        if (empty($_POST) === false && (int)$_POST['request'] === 1) {
            $params = Helpers::getPathData();
            require_once STEPS_PATH . $params[1] . APP_PHP;

            $class = $this->steps[$params[1]]['class'];
            return (new $class)->save($_POST);
        }
    }

    /**
     * Create directory and config.ini, if not present
     *
     * @return bool
    */
    private function initFile()
    {
        $dir = CONFIG_PATH;
        $fullPath = $dir . CONFIG_FILE;

        if (empty($_SESSION['init_app'])) {
            // Check, whether directory exists. If not, create it and add necessary chmod
            if (!is_dir($dir)) {
                mkdir($dir);
                chmod($dir, 700);
            }

            // We have to make sure, there is no file with the same name. Otherwise, delete it.
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }

            touch($fullPath);
            chmod($fullPath, 700);

            $_SESSION['init_app'] = true;
        }

        return null;
    }
}
