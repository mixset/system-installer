<?php

namespace SystemInstaller\Dictionary;

use SystemInstaller\Step\Database;
use SystemInstaller\Step\Finish;
use SystemInstaller\Step\Start;
use SystemInstaller\Step\System;

/**
 * Class StepsList
*/
class StepDictionary
{
    /**
     * @var array
    */
    public $steps = [
        'start' => [
            'class' => Start::class,
            'label' => 'Start',
        ],
        'system' => [
            'class' => System::class,
            'label' => 'Ustawienia systemowe',
        ],
        'database' => [
            'class' => Database::class,
            'label' => 'Baza danych',
        ],
        'finish'   => [
            'class' => Finish::class,
            'label' => 'Krok finalny',
        ],
    ];
}
