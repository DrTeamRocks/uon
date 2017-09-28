<?php

require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Cities.php');

use PHPUnit\Framework\TestCase;

class UsersTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_users;
    private $_user;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_users = new \UON\Users();
        $this->_user = array(
            'u_name' => 'User',
            'u_sname' => 'Test',
            'u_phone' => '123456789'
        );
    }

    public function testCreate()
    {
        $result = $this->_users->create($this->_user);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $result = $this->_users->all();
        $this->assertTrue(is_array($result));

        $id = file_get_contents($this->_file);
        $result = $this->_users->get($id);
        $this->assertTrue(is_array($result));

        $result = $this->_users->getPhone('123456789');
        $this->assertTrue(is_array($result));

        $result = $this->_users->getLabel();
        $this->assertTrue(is_array($result));

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_users->getUpdated($today, $tomorrow);
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $update = $this->_users->update($id, $this->_user);
        $this->assertTrue(is_array($update));
    }
}
