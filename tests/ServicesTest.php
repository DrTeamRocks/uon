<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Services;

class ServicesTest extends TestCase
{
    private $_file;
    private $_services;
    private $_service;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/_token.txt'));

        $this->_file = __DIR__ . '/_tmp.txt';
        $this->_services = new Services($config);
        $this->_service = array(
            'r_id' => '1',
            'type_id' => '1'
        );
    }

    public function testCreate()
    {
        $result = $this->_services->create($this->_service);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_services->getTypes();
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_services->update($id, $this->_service);
        $this->assertInternalType('array', $result);
    }
}
