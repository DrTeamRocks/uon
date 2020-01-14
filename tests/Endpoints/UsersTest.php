<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Users;

class UsersTest extends TestCase
{
    private $object;

    /**
     * @var array
     */
    private $user = [
        'u_name'  => 'User',
        'u_sname' => 'Test',
        'u_phone' => '123456789',
        'u_email' => 'king@roll.com'
    ];

    /**
     * @var int
     */
    public static $userId;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Users($config);
    }

    public function testCreate(): void
    {
        $result       = $this->object->create($this->user);
        self::$userId = $result->id;
        $this->assertIsObject($result);
    }

    public function testAll(): void
    {
        $result = $this->object->all();
        $this->assertIsObject($result);
    }

    public function testGet(): void
    {
        $result = $this->object->get(self::$userId);
        $this->assertIsObject($result);
    }

    public function testSearch(): void
    {
        $result = $this->object->search();
        $this->assertIsObject($result);
    }

    public function testGetLabel(): void
    {
        $result = $this->object->getLabel();
        $this->assertIsObject($result);
    }

    public function testGetPhone(): void
    {
        $result = $this->object->getPhone('123456789');
        $this->assertIsObject($result);
    }

    public function testGetEmail(): void
    {
        $result = $this->object->getEmail('king@roll.com');
        $this->assertIsObject($result);
    }

    public function testGetUpdated(): void
    {
        // Date for next method
        $today    = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->object->getUpdated($today, $tomorrow);
        $this->assertIsObject($result);
    }

    public function testCreateFile(): void
    {
        $file   = [
            'u_id'      => self::$userId,
            'filename'  => 'http://static.skaip.org/img/emoticons/180x180/f6fcff/penguin.gif',
            'name'      => 'имя файл жпг',
            'file_note' => 'extremal'
        ];
        $result = $this->object->createFile($file);
        $this->assertIsObject($result);
    }

    public function testUpdate(): void
    {
        $result = $this->object->update(self::$userId, $this->user);
        $this->assertIsObject($result);
    }

}
