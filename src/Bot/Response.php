<?php
namespace Bot;

use Telegram\Bot\Api;

class Response
{
    /**
     * @var Api
     */
    private $telegram;

    public function __construct(Api $telegram)
    {
        $this->telegram = $telegram;
    }

    public function send(OutMessage $message)
    {
        $this->telegram->sendMessage([
            'chat_id' => $message->getChatId(),
            'text' => $message->getText(),
        ]);
    }
}
