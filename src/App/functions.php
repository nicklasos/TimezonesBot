<?php
namespace App;

function config(string $name = null)
{
    static $config = null;
    if ($config === null) {
        $config = require ROOT . '/config/main.php';
    }

    if ($name === null) {
        return $config;
    }

    if (!isset($config[$name])) {
        throw new \Exception("Config $name not found");
    }

    return $config[$name];
}
