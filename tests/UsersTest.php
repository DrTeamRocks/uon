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
            'u_name' => 'text user'
        );
    }

    public function testAll()
    {
        $result = $this->_users->all();
        $this->assertTrue(is_array($result));
    }

    public function testID()
    {
        $result = $this->_users->get('2');
        $this->assertTrue(is_array($result));
    }

    public function testPhone()
    {
        $result = $this->_users->phone('123456789');
        $this->assertTrue(is_array($result));
    }

    public function testUpdated()
    {
        $result = $this->_users->updated('2017-06-01', '2017-06-10');
        $this->assertTrue(is_array($result));
    }

    public function testCreate()
    {
        $result = $this->_users->create($this->user);
        // TODO: Request the user ID in response and store this into variable
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $result = $this->_users->update('1', $this->user);
        $this->assertTrue(is_array($result));
    }
}
