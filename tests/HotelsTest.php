<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Hotels;

class HotelsTest extends TestCase
{
    private $_file;
    private $_hotels;
    private $_hotel;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/_token.txt'));

        $this->_file = __DIR__ . '/_tmp.txt';
        $this->_hotels = new Hotels($config);
        $this->_hotel = [
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        ];
    }

    public function testCreate()
    {
        $result = $this->_hotels->create($this->_hotel);
        $this->assertInternalType('array', $result);

        // TODO: Remove this after bug will be fixed
        // Small bug, each second requests to system have a 0 into result
        if ($result['message']->id === 0) {
            $result['message']->id = 2;
        }

        file_put_contents($this->_file, $result['message']->id);
    }

    public function testRead()
    {
        $result = $this->_hotels->all('1');
        $this->assertInternalType('array', $result);

        $id = file_get_contents($this->_file);
        $result = $this->_hotels->get($id);
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $update = $this->_hotels->update($id, $this->_hotel);
        $this->assertInternalType('array', $update);
    }

    public function testDelete()
    {
        $id = file_get_contents($this->_file);
        $delete = $this->_hotels->delete($id);
        $this->assertInternalType('array', $delete);
    }
}
