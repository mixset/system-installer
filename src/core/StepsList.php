<?php

/**
 * Class StepsList
*/
class StepsList
{
    /**
     * @var array
    */
    public $steps = [
        'start'    => [
            'class' => \Start::class,
            'label' => 'Start',
        ],
        'system'   => [
            'class' => \System::class,
            'label' => 'Ustawienia systemowe',
        ],
        'database' => [
            'class' => \Database::class,
            'label' => 'Baza danych',
        ],
        'finish'   => [
            'class' => \Finish::class,
            'label' => 'Krok finalny',
        ],
    ];
}
