<?php
namespace Bot;

use Telegram\Bot\Api;

class ResponseSenderTest extends \PHPUnit_Framework_TestCase
{
    public function testResponse()
    {
        $api = $this->getMockBuilder(Api::class)
            ->disableOriginalConstructor()
            ->getMock();

        $api->expects($this->once())
            ->method('sendMessage')
            ->with([
                'chat_id' => '1',
                'text' => '2',
            ]);

        $responseSender = new ResponseSender($api);
        $responseSender->send((new Response())->setChatId('1')->setText('2'));
    }
}
