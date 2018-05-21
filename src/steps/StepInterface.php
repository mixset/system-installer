<?php

namespace SystemInstaller;

/**
 * Interface StepInterface
*/
interface StepInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function save(array $data);
}
