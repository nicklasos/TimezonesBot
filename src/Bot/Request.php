<?php
namespace Bot;

class Request
{
    private $text;
    private $chatId;

    public function setText(string $text): Request
    {
        $this->text = $text;

        return $this;
    }

    public function setChatId(string $chatId): Request
    {
        $this->chatId = $chatId;

        return $this;
    }

    public function getChatId(): string
    {
        return $this->chatId;
    }

    public function getText(): string
    {
        return $this->text;
    }
}
