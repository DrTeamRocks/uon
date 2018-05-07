<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Client;

class ClientTest extends TestCase
{
    public $config;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->config = new Config();
        $this->config->set('token', file_get_contents(__DIR__ . '/_token.txt'));
    }

    public function testConstruct()
    {
        try {
            new Client($this->config);
        } catch(\Exception $e) {
            $this->assertContains('Must be initialized ', $e->getMessage());
        }
    }

    public function testDoRequest()
    {
        $client = new Client($this->config);
        $result = $client->doRequest('get', '/user');
        $this->assertInternalType('array', $result);
    }

}
