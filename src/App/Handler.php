<?php
namespace App;

use App\Exceptions\WrongCountryException;
use Bot\Request;
use Bot\Response;

class Handler
{
    public function __invoke(Request $request): Response
    {
        if (strpos($request->getText(), '/start') === 0) {
            return $this->startMessage($request);
        } else {
            return $this->countryMessage($request);
        }
    }

    private function countryMessage(Request $request): Response
    {
        $countryTime = new CountryTime();

        $response = new Response();
        $response->setChatId($request->getChatId());

        $text = $request->getText();

        try {
            $timeZones = $countryTime->get($text);
        } catch (WrongCountryException $e) {

            return $response->setText('Sorry, country not found');
        }

        return $response->setText($this->formatTimeZones($timeZones));
    }

    private function startMessage(Request $request): Response
    {
        $text = "Hello! Send me country or country code and i'll send you time\n" .
            "For example: RU, GB, US, Ukraine, Poland";

        return (new Response())
            ->setChatId($request->getChatId())
            ->setText($text);
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
