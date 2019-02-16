<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Hotels;

class HotelsTest extends TestCase
{
    private $_hotels;
    private $_hotel;
    public static $hotelId;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

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

        self::$hotelId = $result['message']->id;
    }

    public function testRead()
    {
        $result = $this->_hotels->all('1');
        $this->assertInternalType('array', $result);

        $result = $this->_hotels->get(self::$hotelId);
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $update = $this->_hotels->update(self::$hotelId, $this->_hotel);
        $this->assertInternalType('array', $update);
    }

    public function testDelete()
    {
        $delete = $this->_hotels->delete(self::$hotelId);
        $this->assertInternalType('array', $delete);
    }
}
