<?php
namespace Bot;

class Response
{
    private $text;
    private $chatId;

    public function __construct(string $text = null)
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): Response
    {
        $this->text = $text;

        return $this;
    }

    public function getChatId(): string
    {
        return $this->chatId;
    }

    public function setChatId(string $chatId): Response
    {
        $this->chatId = $chatId;

        return $this;
    }

}