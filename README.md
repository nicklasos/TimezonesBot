# TimezonesBot
Simple telegram bot


## Example
```php
<?php

require 'vendor/autoload.php';

use Bot\Bot;
use Bot\Request;
use Bot\Response;

$config = [
    'telegram.key' => 'secret key',
    'telegram.webhook' => 'https://', // not required for long-poling
    'telegram.mode' => 'long-poling', // 'webhook'
];

(new Bot($config))
    ->onMessage(function (Request $request): Request {
        return new Response($request->getChatId(), "Hello!");
    })
    ->run();
```