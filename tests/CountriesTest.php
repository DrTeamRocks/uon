<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Countries;

class CountriesTest extends TestCase
{
    private $_file;
    private $_countries;
    private $_country;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/_token.txt'));

        $this->_file = __DIR__ . '/_tmp.txt';
        $this->_countries = new Countries($config);
        $this->_country = [
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        ];
    }

    public function testCreate()
    {
        $result = $this->_countries->create($this->_country);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_countries->all();
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_countries->update($id, $this->_country);
        $this->assertInternalType('array', $result);
    }

}
