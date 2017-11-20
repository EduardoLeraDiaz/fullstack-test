<?php

namespace api\controller;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

/**
 * @author Eduardo Lera Diaz
 */
class ProfileControllerTest extends TestCase
{
    public function testGet() {
        $expectedResponseBody = '{"status":"ok","data":{"id":"1","name":"Sophie","age":"22","city":"New York","description":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ligula ex, mattis rutrum luctus ut, dapibus eget augue. Sed id lectus sit amet erat consectetur elementum. "}}';
        $response = $this->client->request('GET', '/api/profile/1');

        $this->assertEquals($expectedResponseBody,$response->getBody());
    }

    public function testGetWithAnUnexistingId() {
        $expectedResponseBody = '{"status":"error","message":"Profile not found"}';
        $response = $this->client->request('GET', '/api/profile/10000');
        $this->assertEquals($expectedResponseBody,$response->getBody());
    }
}