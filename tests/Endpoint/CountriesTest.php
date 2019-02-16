<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Countries;

class CountriesTest extends TestCase
{
    private $_countries;
    private $_country;

    public static $countryId;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_countries = new Countries($config);
        $this->_country = [
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        ];
    }

    public function testCreate()
    {
        $result = $this->_countries->create($this->_country);
        self::$countryId = $result['message']->id;
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_countries->all();
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $result = $this->_countries->update(self::$countryId, $this->_country);
        $this->assertInternalType('array', $result);
    }

}
