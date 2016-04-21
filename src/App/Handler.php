<?php
namespace App;

use App\Exceptions\WrongCountryException;
use Bot\InMessage;
use Bot\OutMessage;
use Bot\Response;

class Handler
{
    /**
     * @var InMessage
     */
    private $inMessage;

    /**
     * @var Response
     */
    private $response;

    public function __construct(InMessage $inMessage, Response $response)
    {
        $this->inMessage = $inMessage;
        $this->response = $response;
    }

    public function handle()
    {
        if (strpos($this->inMessage->getText(), '/start') === 0) {
            $this->startMessage();
        } else {
            $this->countryMessage();
        }
    }

    private function countryMessage()
    {
        $countryTime = new CountryTime();

        $outMessage = new OutMessage();
        $outMessage->setChatId($this->inMessage->getChatId());

        $text = $this->inMessage->getText();

        try {
            $timeZones = $countryTime->get($text);
        } catch (WrongCountryException $e) {

            $outMessage->setText('Sorry, country not found');
            $this->response->send($outMessage);

            return;
        }

        $outMessage->setText($this->formatTimeZones($timeZones));

        $this->response->send($outMessage);
    }

    private function startMessage()
    {
        $text = "Hello! Send me country code and i'll send you time\n";
        $text .= "For example: RU, GB, US";

        $message = (new OutMessage())
            ->setChatId($this->inMessage->getChatId())
            ->setText($text);

        $this->response->send($message);
    }

    private function formatTimeZones(array $timeZones): string
    {
        $result = '';
        foreach ($timeZones as $city => $time) {
            $result .= "$city $time\n";
        }

        return $result;
    }
}
