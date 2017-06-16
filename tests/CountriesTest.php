<?php

require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Countries.php');

use PHPUnit\Framework\TestCase;

class CountriesTest extends TestCase
{
    private $_config;
    private $_token;
    private $_countries;
    private $country;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = require_once __DIR__ . "/../tests/config.php";
        $this->_token = $this->_config['token'];
        $this->_countries = new \UON\Countries($this->_token);

        $this->country = array(
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        );
    }

    public function testAll()
    {
        $result = $this->_countries->all('1');
        $this->assertTrue(is_array($result));
    }

    public function testCreate()
    {
        $result = $this->_countries->create($this->country);
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $this->country['id'] = '1';
        $result = $this->_countries->update('1', $this->country);
        $this->assertTrue(is_array($result));
    }

}
