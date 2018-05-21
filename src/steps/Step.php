<?php

namespace SystemInstaller;

use Config\Config;

/**
 * Class Step
*/
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
