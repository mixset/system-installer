<?php

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

    public function save(array $data)
    {
        $this->config->createArray('database');

        foreach ($this->fields as $value) {
            $this->config->setConfig($value, $data[$value]);
        }
    }
}
