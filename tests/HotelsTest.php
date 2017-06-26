<?php

require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Countries.php');

use PHPUnit\Framework\TestCase;

class HotelsTest extends TestCase
{
    private $_config;
    private $_token;
    private $_hotels;
    private $id;
    private $hotel;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_hotels = new \UON\Hotels($this->_token);

        $this->hotel = array(
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        );
    }

    public function testAll()
    {
        $result = $this->_hotels->all('1');
        $this->assertTrue(is_array($result));
    }

    public function testID()
    {
        $result = $this->_hotels->get('2');
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $this->hotel['id'] = '1';
        $result = $this->_hotels->update('1', $this->hotel);
        $this->assertTrue(is_array($result));
    }

    public function testCreateDelete()
    {
        $create = $this->_hotels->create($this->hotel);
        error_log(print_r($create,true));
        $this->assertTrue(is_array($create));

        $delete = $this->_hotels->delete($create['message']->id);
        error_log(print_r($delete,true));
        $this->assertTrue(is_array($delete));
    }
}
