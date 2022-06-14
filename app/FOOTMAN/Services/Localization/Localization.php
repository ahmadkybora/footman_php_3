<?php

namespace App\FOOTMAN\Services\Localization;

class Localization
{
    /**
     * در این قسمت لوکالیزیشن انجام میشود
     */
    public function __construct($msg)
    {
        $lang = require_once(__DIR__ . "/config.php");
        $c = require_once(__DIR__ . "/../../../../resources/lang/" . $lang['lang'] . ".php");
        echo ($c[$msg]);
    }
}