<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Cities.php');

use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    private $_config;
    private $_token;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
    }

    public function testDoRequest()
    {
        $factory = new UON\Client($this->_token);

        // Check if request return the array
        $result = $factory->doRequest('get', '/user');
        $this->assertTrue(is_array($result));
    }

}
