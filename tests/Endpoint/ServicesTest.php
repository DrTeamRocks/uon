<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Services;

class ServicesTest extends TestCase
{
    private $_services;
    private $_service;
    public static $serviceId;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_services = new Services($config);
        $this->_service = array(
            'r_id' => '1',
            'type_id' => '1'
        );
    }

    public function testCreate()
    {
        $result = $this->_services->create($this->_service);
        self::$serviceId = $result['message']->id;
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_services->getTypes();
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $result = $this->_services->update(self::$serviceId, $this->_service);
        $this->assertInternalType('array', $result);
    }
}
