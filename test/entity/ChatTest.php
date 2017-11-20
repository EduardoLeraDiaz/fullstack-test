<?php

namespace api\entity;

use Mockery;
use api\entity\Message;
use api\entity\Chat;
use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * @author Eduardo Lera Diaz
 */
class ChatTest extends TestCase
{
    protected $client;

    public function test__toArray()
    {
        $time1 = time();
        $time2 = time();
        $time3 = time();

        $message1 = new Message('1', $time1, 'Message 1', '1');
        $message2 = new Message('2', $time2, 'Message 2', '2');
        $message3 = new Message('3', $time3, 'Message 3', '1');

        $chat = new Chat('1', '1', '2', [$message1, $message2, $message3]);

        $expected = [
            'id' => '1',
            'profile1' => '1',
            'profile2' => '2',
            'messages' => [
                [
                    'id' => '1',
                    'datetime' => $time1,
                    'message' => 'Message 1',
                    'sender' => '1'
                ],
                [
                    'id' => '2',
                    'datetime' => $time2,
                    'message' => 'Message 2',
                    'sender' => '2'
                ],
                [
                    'id' => '3',
                    'datetime' => $time3,
                    'message' => 'Message 3',
                    'sender' => '1'
                ]
            ]
        ];
        $this->assertEquals($expected, $chat->toArray());
    }
}