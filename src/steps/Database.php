<?php

namespace SystemInstaller;

/**
 * Class Database
 * @package SystemInstaller
*/
class Database extends Step
{
    /**
     * Fields to save
     *
     * @var array
    */
    private $fields = [
        'hostname',
        'db_name',
        'user',
        'password',
        'prefix',
    ];

    /**
     * @param array $data
     * @return mixed
    */
    public function save(array $data)
    {
        $this->config->createArray('database');

        foreach ($this->fields as $value) {
            $this->config->setConfig($value, $data[$value]);
        }
    }
}
