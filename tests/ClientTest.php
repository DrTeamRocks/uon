<?php

require_once(__DIR__ . '/../src/Client.php');

use PHPUnit\Framework\TestCase;
use UON\Client;

class ClientTest extends TestCase
{
    private $_config;
    private $_token;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->_config = require_once __DIR__ . "/../tests/config.php";
        $this->_token = $this->_config['token'];
    }

    public function testDoRequest()
    {
        $factory = new Client($this->_token);

        // Check if request return the array
        $result = $factory->doRequest('get', '/users');
        $this->assertTrue(is_array($result));
    }

}
