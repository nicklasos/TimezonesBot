<?php
namespace Bot;

class InMessage
{
    private $text;
    private $chatId;

    public function setText(string $text): InMessage
    {
        $this->text = $text;

        return $this;
    }

    public function setChatId(string $chatId): InMessage
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
