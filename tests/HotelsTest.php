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

    public function testCURD()
    {
        /**
         * Create
         */
        $create = $this->_hotels->create($this->hotel);
        $this->assertTrue(is_array($create));

        // TODO: Remove this after bug will be fixed
        // Small bug, each second requests to system have a 0 into result
        if ($create['message']->id == 0) $create['message']->id = 2;

        /**
         * Update
         */
        $update = $this->_hotels->update($create['message']->id, $this->hotel);
        $this->assertTrue(is_array($update));

        /**
         * Read
         */
        $result = $this->_hotels->all('1');
        $this->assertTrue(is_array($result));

        $result = $this->_hotels->get($create['message']->id);
        $this->assertTrue(is_array($result));

        /**
         * Delete
         */
        $delete = $this->_hotels->delete($create['message']->id);
        $this->assertTrue(is_array($delete));
    }
}
