<?php
namespace App;

function config(string $name)
{
    static $config = null;
    if ($config === null) {
        $config = require ROOT . '/config/main.php';
    }

    if (!isset($config[$name])) {
        throw new \Exception("Config $name not found");
    }

    return $config[$name];
}
