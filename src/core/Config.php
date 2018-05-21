<?php

namespace Config;

use SystemInstaller\ConfigException;

/**
 * Class config
*/
class Config
{
    /**
     * @var
    */
    private $file;

    /**
     * @param $file
    */
    public function init($file)
    {
        $this->file = $file;
    }

    /**
     * @param $arrayName
     * @return bool
     * @throws \Exception
    */
    public function createArray($arrayName)
    {
        if ($this->isArrayExist($arrayName) === true) {
             throw new ConfigException('Given array name ( ' . $arrayName . ' ) already exists in a ' . $this->file);
        } else {
            $arrayName = '[' . $arrayName . ']';

            if (filesize($this->file) !== 0) {
                $content = PHP_EOL . $arrayName;
            } else {
                $content = $arrayName;
            }

            if (!file_put_contents($this->file, $content . PHP_EOL, FILE_APPEND)) {
                throw new \Exception('There was a problem with adding new data to file.');
            } else {
                return true;
            }
        }
    }

    /**
     * @param $name
     * @param $value
     * @return bool
     * @throws \Exception
     */
    public function setConfig($name, $value)
    {
        if ($this->isKeyExist($name, $this->file)) {
            throw new ConfigException('Given key ( ' . $name . ' ) already exists in a ' . $this->file);
        } else {
            $string = '';

            if (is_int($value) || is_float($value) || is_double($value)) {
                $string .= $name . ' = ' . $value;
            } elseif (is_string($value)) {
                $string .= $name . ' = ' . '"' . $value . '"';
            } elseif (is_bool($value)) {
                $string .= $name . ' = ' . ($value === true) ? "true" : "false";
            }

            file_put_contents($this->file, $string . PHP_EOL, FILE_APPEND);
        }
    }

    /**
     * @param array $search
     * @return array
     * @throws \Exception
     */
    public function getConfig($search = [])
    {
        if (filesize($this->file) === 0) {
            throw new ConfigException('File ' . $this->file . ' can not be empty.');
        }

        if (!$config = parse_ini_file($this->file)) {
            throw new ConfigException('There was a problem with parsing a ini file');
        }

        $data = [];

        foreach ($search as $key) {
            $data[] = $config[$key];
        }

        return $data;
    }

    /**
     * @param $key
     * @param $file
     * @return bool
    */
    private function isKeyExist($key, $file)
    {
        return array_key_exists(
            $key,
            parse_ini_file($file)
        );
    }

    /**
     * @param $name
     * @return bool|null
    */
    private function isArrayExist($name)
    {
        if (file_exists($this->file) && filesize($this->file) !== 0) {
            $file = parse_ini_file($this->file, true);
            return isset($file[$name]);
        } else {
            return null;
        }
    }
}
