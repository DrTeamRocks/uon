<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Users;

class UsersTest extends TestCase
{
    private $_users;
    private $_user;
    public static $userId;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_users = new Users($config);
        $this->_user = array(
            'u_name' => 'User',
            'u_sname' => 'Test',
            'u_phone' => '123456789',
            'u_email' => 'king@roll.com'
        );
    }

    public function testCreate()
    {
        $result = $this->_users->create($this->_user);
        self::$userId = $result['message']->id;
        $this->assertInternalType('array', $result);
    }

    public function testAll()
    {
        $result = $this->_users->all();
        $this->assertInternalType('array', $result);
    }

    public function testGet()
    {
        $result = $this->_users->get(self::$userId);
        $this->assertInternalType('array', $result);
    }

    public function testSearch()
    {
        $result = $this->_users->search();
        $this->assertInternalType('array', $result);
    }

    public function testGetLabel()
    {
        $result = $this->_users->getLabel();
        $this->assertInternalType('array', $result);
    }

    public function testGetPhone()
    {
        $result = $this->_users->getPhone('123456789');
        $this->assertInternalType('array', $result);
    }

    public function testGetEmail()
    {
        $result = $this->_users->getEmail('king@roll.com');
        $this->assertInternalType('array', $result);
    }

    public function testGetUpdated()
    {
        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_users->getUpdated($today, $tomorrow);
        $this->assertInternalType('array', $result);
    }

    public function testCreateFile()
    {
        $file = [
            'u_id' => self::$userId,
            'filename' => 'http://static.skaip.org/img/emoticons/180x180/f6fcff/penguin.gif',
            'name' => 'имя файл жпг',
            'file_note' => 'extremal'
        ];
        $result = $this->_users->createFile($file);
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $result = $this->_users->update(self::$userId, $this->_user);
        $this->assertInternalType('array', $result);
    }

}
