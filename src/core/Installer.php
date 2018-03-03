<?php

namespace Installer;

require_once 'src/steps/StepInterface.php';
require_once 'src/steps/Step.php';

/**
 * Class Installer
 * @package Installer
*/
class Installer
{
    /**
     * Config.ini paths
     *
     * @var array
    */
    private $config = [
        'path' => 'src/config/',
        'fileName' => 'config.ini'
    ];

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
        $this->steps = (new \StepsList())->steps;
    }

    /**
     * Perform save action of given class from current step
     *
     * @return mixed
    */
    public function installManager()
    {
        if (empty($_POST) === false && (int)$_POST['request'] === 1) {
            $params = \Helpers::getPathData();
            require_once 'src/steps/' . $params[1] . '.php';

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
        $dir = $this->config['path'];
        $fullPath = $dir . $this->config['fileName'];

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
