<?php

namespace SystemInstaller\Core;

use SystemInstaller\Exceptions\RouterException;

/**
 * Class Router
 * @package SystemInstaller
*/
class Router
{
    /**
     * @param $step
     * @throws \Exception
    */
    public function route($step)
    {
        $step = trim(strip_tags($step));

        if (!is_string($step) || is_null($step)) {
            throw new \Exception('$step variable must be INT type and cannot be NULL!');
        } else {
            $pathToFile = TEMPLATES_PATH . $step . APP_PHP;

            if (file_exists($pathToFile) && filesize($pathToFile) !== 0) {
                include $pathToFile;
            } else {
                throw new RouterException('File: ' . $pathToFile . 'does not exist or is empty.');
            }
        }
    }
}
