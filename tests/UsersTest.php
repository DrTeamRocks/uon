<?php

require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Cities.php');

use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase
{
    private $_config;
    private $_token;
    private $_users;
    private $user;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_users = new \UON\Users($this->_token);

        // Data array of new user (or details for update)
        $this->user = array(
            'u_name' => 'User',
            'u_sname' => 'Test',
            'u_phone' => '123456789'
        );
    }

    public function testCRUD()
    {
        /**
         * Create
         */
        $create = $this->_users->create($this->user);
        $this->assertTrue(is_array($create));

        /**
         * Update
         */
        $update = $this->_users->update($create['message']->id, $this->user);
        $this->assertTrue(is_array($update));

        /**
         * Read
         */
        $result = $this->_users->all();
        $this->assertTrue(is_array($result));

        $result = $this->_users->get($create['message']->id);
        $this->assertTrue(is_array($result));

        $result = $this->_users->phone('123456789');
        $this->assertTrue(is_array($result));

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_users->updated($today, $tomorrow);
        $this->assertTrue(is_array($result));
    }
}
