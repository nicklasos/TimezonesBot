<?php
namespace App;

class CountryTimeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CountryTime
     */
    private $country;

    public function setUp()
    {
        $this->country = new CountryTime();
    }

    /**
     * @expectedException \App\Exceptions\WrongCountryException
     */
    public function testCountryTime()
    {
        $this->country->get('not exists');
    }

    public function testCorrectDateTime()
    {
        $result = $this->country->get('UA');

        $timeZones = [
            'Kiev',
            'Uzhgorod',
            'Zaporozhye',
        ];

        $this->assertEquals($timeZones, array_keys($result));
    }

    public function testCountryName()
    {
        $result = $this->country->get('Ukraine');

        $timeZones = [
            'Kiev',
            'Uzhgorod',
            'Zaporozhye',
        ];

        $this->assertEquals($timeZones, array_keys($result));
    }
}
