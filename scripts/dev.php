<?php

define('ROOT', dirname(__DIR__));

require ROOT . '/vendor/autoload.php';

use function App\config;
use App\Handler;
use Bot\InMessage;
use Bot\Response;
use Telegram\Bot\Api;

$telegram = new Api(config('telegram.key'));
$response = new Response($telegram);

$messages = $telegram->getUpdates();
$message = array_last($messages);

$inMessage = (new InMessage())
    ->setText($message->getMessage()->getText())
    ->setChatId($message->getMessage()->getChat()->getId());

$handler = new Handler($inMessage, $response);
$handler->handle();
