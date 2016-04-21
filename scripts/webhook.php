<?php

define('ROOT', (dirname(__DIR__)));
require ROOT . '/vendor/autoload.php';

use function App\config;
use Telegram\Bot\Api;

$telegram = new Api(config('telegram.key'));
$telegram->setWebhook([
    'url' => config('telegram.webhook'),
]);
