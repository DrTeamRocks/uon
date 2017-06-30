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

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_countries = new \UON\Countries($this->_token);

        $this->country = array(
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        );
    }

    public function testCURD()
    {
        /**
         * Create
         */
        $create = $this->_countries->create($this->country);
        $this->assertTrue(is_array($create));

        /**
         * Update
         */
        $update = $this->_countries->update($create['message']->id, $this->country);
        $this->assertTrue(is_array($update));

        /**
         * Read
         */
        $result = $this->_countries->all();
        $this->assertTrue(is_array($result));
    }

}
