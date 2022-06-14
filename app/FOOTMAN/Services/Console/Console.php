<?php

namespace App\Footman\Services\Console;

class Console
{
    private $FOOTMAN = 'footman';
    private $SERVE = 'serve';
    private $MODEL = 'make:model';
    private $CONTROLLER = 'make:controller';

    public function __construct()
    {
        $args = $_SERVER['argv'];
        (!$args[0] === $this->FOOTMAN) ? dd($args) : '';
        switch($args[1]) {
            case $this->SERVE:
                Commands::serve();
            break;
            case $this->MODEL:
                Commands::makeModel($args[2]);
            break;
            case $this->CONTROLLER:
                Commands::makeController($args[2]);
            break;
        }

    }
}