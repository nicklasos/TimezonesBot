<?php
namespace Bot;

use Telegram\Bot\Api;

class Bot
{
    /**
     * @var array
     */
    private $config;

    /**
     * @var callable
     */
    private $onMessage;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function onMessage(callable $onMessage): Bot
    {
        $this->onMessage = $onMessage;

        return $this;
    }

    public function run()
    {
        $telegram = new Api($this->config['telegram.key']);
        $responseSender = new ResponseSender($telegram);

        if ($this->config['telegram.mode'] == 'long-poling') {
            $messages = $telegram->getUpdates();
            $messages = [array_last($messages)];
        } else {
            $messages = $telegram->getWebhookUpdates();
        }

        foreach ($messages as $message) {
            $request = (new Request())
                ->setText($message->getMessage()->getText())
                ->setChatId($message->getMessage()->getChat()->getId());

            $onMessage = $this->onMessage;
            $response = $onMessage($request);

            if ($response) {
                if (!$response->getChatId()) {
                    $response->setChatId($request->getChatId());
                }

                $responseSender->send($response);
            }
        }
    }
}
