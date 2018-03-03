<?php

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
            $pathToFile = 'src/templates/' . $step . '.php';

            if (file_exists($pathToFile) && filesize($pathToFile) !== 0) {
                include $pathToFile;
            } else {
                throw new \Exception('File: ' . $pathToFile . 'does not exist or is empty.');
            }
        }
    }
}
