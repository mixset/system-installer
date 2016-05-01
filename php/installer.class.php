<?php

namespace Installer;

/**
 * Class Installer
 * @package Installer
*/
class Installer
{
    /**
     * @var array
     */
    private $config = [
        'parts' => [
            'path' => 'parts/',
            'ext' => '.part.php'
        ],
        'cfg' => [
            'path' => 'config/',
            'fileName' => 'config.ini'
        ],
        'class'
    ];

    /**
     * @param $object
     */
    public function __construct($object)
    {
        $this -> config['class'] = $object;

        $this -> initFile();
    }

    /**
     * @param int $length
     * @return string
     */
    public function randomCode($length = 8)
    {
        list($uSec, $sec) = explode(' ', microtime());
        srand((float)$sec + ((float)$uSec * 100000));

        $validChars = "abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

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
     * @param $step
     * @throws \Exception
     */
    public function route($step)
    {

        $step = trim(strip_tags($step));

        if (!is_string($step) || is_null($step)) {
            throw new \Exception('$step variable must be INT type and cannot be NULL!');
        } else {
            $pathToFile = $this->config['parts']['path'] . $step . $this->config['parts']['ext'];

            if (file_exists($pathToFile) && filesize($pathToFile) !== 0) {
                $installer = $this;
                include $pathToFile;
            } else {
                throw new \Exception('File: ' . $pathToFile . 'does not exist or is empty.');
            }
        }
    }

    /**
     * @return bool
     */
    private function initFile()
    {
        $dir = $this->config['cfg']['path'];
        $fullPath = $dir . $this->config['cfg']['fileName'];

        if (empty($_SESSION['init_app']) || is_null($_SESSION['init_app'])) {
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

        $this -> config['class'] -> init($fullPath);

        return true;

    }

    /**
     * Return array with data about current step
     * @return array
     */
    public function getPathData()
    {
        $url = explode('/', parse_url($_SERVER['HTTP_REFERER'])['path']);
        $url = end($url);
        return explode('-', $url);
    }

    /**
     * @param array $data
     * @return bool
     */
    public function basic(array $data)
    {
        $this -> config['class'] -> createArray('basic');

        $data = array_map('strip_tags', $data);

        $debug = $data['debug_mode'] == '0' ? 'false' : 'true';
        $encoding = (!empty($data['encoding_other']) && !is_null($data['encoding_other'])) ? $data['encoding_other'] : $data['encoding_basic'];

        $result[0] = $this->config['class'] -> setConfig('language', $data['language']);
        $result[1] = $this->config['class'] -> setConfig('debug', $debug);
        $result[2] = $this->config['class'] -> setConfig('encoding', $encoding);

        return (in_array(false, $result)) ? false : true;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function database(array $data)
    {
        if (empty($data['database_name']) || empty($data['user_name']) || empty($data['host_name']) || empty($data['prefix'])) {
            return 'Uzupełnij wszystkie pola formularza';
        } else {
            $this -> config['class'] -> createArray('database');
            $data = array_map('strip_tags', $data);

            $result[0] = $this->config['class'] -> setConfig('db_name', $data['database_name']);
            $result[1] = $this->config['class'] -> setConfig('user', $data['user_name']);
            $result[2] = $this->config['class'] -> setConfig('password', $data['password']);
            $result[3] = $this->config['class'] -> setConfig('host', $data['host_name']);
            $result[4] = $this->config['class'] -> setConfig('prefix', $data['prefix']);

            return (in_array(false, $result)) ? false : true;
        }
    }
}