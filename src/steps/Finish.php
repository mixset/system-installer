<?php

namespace SystemInstaller\Step;

/**
 * Class Finish
*/
class Finish extends Step
{
    /**
     * @param array $data
     * @return mixed
    */
    public function save(array $data)
    {
        unset($_SESSION['init_app']);
    }
}
