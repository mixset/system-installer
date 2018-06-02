<?php

namespace SystemInstaller\Step;

use Mixset\ConfigManager\Config;

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
        $this->config->setPath(CONFIG_PATH . CONFIG_FILE);
        $this->config->init();
    }
}
