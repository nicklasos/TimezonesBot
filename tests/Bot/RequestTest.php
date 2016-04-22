<?php
namespace Bot;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    public function testRequest()
    {
        $request = new Request();
        $request->setChatId(1);
        $request->setText('name');

        $this->assertEquals('1', $request->getChatId());
        $this->assertEquals('name', $request->getText());
    }
}
