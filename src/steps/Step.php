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
     * Initialize basic stuff
    */
    public function __construct()
    {
        $this->config = new Config();
        $this->config->init(CONFIG_PATH . CONFIG_FILE);
    }
}
