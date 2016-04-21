<?php
namespace App;

use App\Exceptions\WrongCountryException;
use DateTime;
use DateTimeZone;

class CountryTime
{
    public function get(string $country): array
    {
        $result = @DateTimeZone::listIdentifiers(DateTimeZone::PER_COUNTRY, strtoupper($country));
        if (!$result || !isset($result[0])) {
            throw new WrongCountryException();
        }

        $timeZones = [];
        foreach ($result as $timeZone) {
            $city = explode('/', $timeZone)[1];
            $time = new DateTime('now', new DateTimeZone($timeZone));

            $timeZones[$city] = $time->format('H:i:s');
        }

        asort($timeZones);

        return $timeZones;
    }
}
