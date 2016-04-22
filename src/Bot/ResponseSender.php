<?php
namespace Bot;

use Telegram\Bot\Api;

class ResponseSender
{
    /**
     * @var Api
     */
    private $telegram;

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    public function send(Response $message)
    {
        $this->telegram->sendMessage([
            'chat_id' => $message->getChatId(),
            'text' => $message->getText(),
        ]);
    }
}
