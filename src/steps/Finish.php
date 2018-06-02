<?php

namespace SystemInstaller\Step;

/**
 * Class Finish
*/
class Finish extends Step
{
    public function save(array $data)
    {
        unset($_SESSION['init_app']);
    }
}
