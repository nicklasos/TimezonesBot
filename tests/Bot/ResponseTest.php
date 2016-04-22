<?php
namespace Bot;

class ResponseTest extends \PHPUnit_Framework_TestCase
{
    public function testResponse()
    {
        $response = new Response();
        $response->setChatId(1);
        $response->setText('name');

        $this->assertEquals('1', $response->getChatId());
        $this->assertEquals('name', $response->getText());
    }
}
