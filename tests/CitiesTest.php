<?php

require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Cities.php');

use PHPUnit\Framework\TestCase;

class CitiesTest extends TestCase
{
    private $_config;
    private $_token;
    private $_cities;
    private $city;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_cities = new \UON\Cities($this->_token);

        $this->city = array(
            'country_id' => '1',
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        );
    }

    public function testAll()
    {
        $result = $this->_cities->all('1');
        $this->assertTrue(is_array($result));
    }

    public function testCreate()
    {
        $result = $this->_cities->create($this->city);
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $this->city['id'] = '1';
        $result = $this->_cities->update('1', $this->city);
        $this->assertTrue(is_array($result));
    }

}
