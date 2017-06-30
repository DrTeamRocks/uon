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

    public function testCRUD()
    {
        /**
         * Create
         */
        $create = $this->_cities->create($this->city);
        $this->assertTrue(is_array($create));

        /**
         * Update
         */
        $update = $this->_cities->update($create['message']->id, $this->city);
        $this->assertTrue(is_array($update));

        /**
         * Read
         */
        $result = $this->_cities->all($this->city['country_id']);
        $this->assertTrue(is_array($result));
    }

}
