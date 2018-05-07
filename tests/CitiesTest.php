<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Cities;

class CitiesTest extends TestCase
{
    private $_file;
    private $_cities;
    private $_city;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/_token.txt'));

        $this->_file = __DIR__ . '/_tmp.txt';
        $this->_cities = new Cities($config);
        $this->_city = array(
            'country_id' => '1',
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        );
    }

    public function testCreate()
    {
        $result = $this->_cities->create($this->_city);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_cities->all($this->_city['country_id']);
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $update = $this->_cities->update($id, $this->_city);
        $this->assertInternalType('array', $update);
    }

}
