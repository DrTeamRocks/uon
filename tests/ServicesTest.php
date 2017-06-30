<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Services.php');

use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase
{
    private $_config;
    private $_token;
    private $_services;
    private $service;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_services = new \UON\Services($this->_token);

        $this->service = array(
            'r_id' => '1',
            'type_id' => '1'
        );
    }

    public function testCRUD()
    {
        /**
         * Create
         */
        $create = $this->_services->create($this->service);
        $this->assertTrue(is_array($create));

        /**
         * Read
         */
        $result = $this->_services->type();
        $this->assertTrue(is_array($result));

        /**
         * Update
         */
        $update = $this->_services->update($create['message']->id, $this->service);
        $this->assertTrue(is_array($update));
    }
}
