<?php
namespace Bot;

class OutMessage
{
    private $text;
    private $chatId;

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): OutMessage
    {
        $this->text = $text;

        return $this;
    }

    public function getChatId(): string
    {
        return $this->chatId;
    }

    public function setChatId(string $chatId): OutMessage
    {
        $this->chatId = $chatId;

        return $this;
    }

}