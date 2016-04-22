<?php

define('ROOT', dirname(__DIR__));

require ROOT . '/vendor/autoload.php';

use App\Handler;
use Bot\Bot;
use function App\config;

$config = config();
$config['telegram.mode'] = 'long-poling';

(new Bot($config))
    ->onMessage(new Handler())
    ->run();
