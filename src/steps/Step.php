<?php

use Config\Config;

abstract class Step implements StepInterface
{
    /**
     * Property handler for Config object
     *
     * @var
     */
    protected $config;

    /**
     * File, where config data will be saved
    */
    const CONFIG_PATH = 'src/config/config.ini';

    /**
     * Initialize basic stuff
    */
    public function __construct()
    {
        $this->config = new Config();
        $this->config->init(self::CONFIG_PATH);
    }
}
