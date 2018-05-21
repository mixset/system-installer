<?php

namespace SystemInstaller;

/**
 * Class Helpers
 * @package SystemInstaller
*/
class Helpers
{
    /**
     * Return array with data about current step
     * @return array
     */
    public static function getPathData()
    {
        $url = explode('/', parse_url($_SERVER['HTTP_REFERER'])['path']);
        $url = end($url);

        return explode('-', $url);
    }

    /**
     * @param int $length
     * @return string
     */
    public static function randomCode($length = 8)
    {
        list($uSec, $sec) = explode(' ', microtime());
        srand((float)$sec + ((float)$uSec * 100000));

        $validChars = 'abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $code = '';
        $counter = 0;

        while ($counter < $length) {
            $actChar = substr($validChars, rand(0, strlen($validChars) - 1), 1);
            $code .= $actChar;
            $counter++;
        }
        return $code;
    }

    /**
     * Return menu as a key and label
    */
    public static function getMenu()
    {
        $stepsList = (new StepsList())->steps;

        $menuItems = [];

        foreach ($stepsList as $key => $value) {
            $menuItems[$key] = $value['label'];
        }

        return $menuItems;
    }
}
