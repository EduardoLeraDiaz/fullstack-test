<?php

namespace api\controller;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

/**
 * @author Eduardo Lera Diaz
 */
class ChatControllerTest extends TestCase
{
    /**
     * @var Client
     */
    private $client;

    public function setUp()
    {
        $this->client = new Client(['base_uri' => 'http://127.0.0.1']);
    }

    public function testGetChat()
    {
        // First call
        $response = $this->client->request('GET', '/api/api/chat/2/1');
        $responseData = json_decode($response->getBody(), true);
        $this->assertEquals(1, count($responseData['data']['messages']) === 1);

        // Second Call
        $expectedDataWithoutMessages = [
            "status" => "ok",
            "data" => [
                "id" => "1",
                "profile1" => "2",
                "profile2" => "1",
                "messages" => []
            ]
        ];
        $response = $this->client->request('POST', '/api/api/chat/2/1', [
                'form_params' => [
                    'message' => 'test message'
                ]
            ]
        );
        $responseData = json_decode($response->getBody(), true);
        $this->assertEquals(1, count($responseData['data']['messages']) === 2);
        $responseData['data']['messages'] = [];
        $this->assertEquals($expectedDataWithoutMessages,$responseData);

    }
}