<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Users;

class UsersTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Users
     */
    private $object;

    /**
     * @var array
     */
    private $user = [
        'u_name'  => 'User',
        'u_sname' => 'Test',
        'u_phone' => '123456789',
        'u_email' => 'king@roll.com',
    ];

    /**
     * @var int
     */
    public static $userId;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->object = new Users($config);
    }

    public function test_create(): void
    {
        $result = $this->object->create($this->user);

        self::$userId = $result->id;

        self::assertIsObject($result);
    }

    public function test_all(): void
    {
        $result = $this->object->all();
        self::assertIsObject($result);
    }

    public function test_get(): void
    {
        $result = $this->object->get(self::$userId);
        self::assertIsObject($result);
    }

    public function test_search(): void
    {
        $result = $this->object->search();
        self::assertIsObject($result);
    }

    public function test_getLabel(): void
    {
        $result = $this->object->getLabel();
        self::assertIsObject($result);
    }

    public function test_getPhone(): void
    {
        $result = $this->object->getPhone('123456789');
        self::assertIsObject($result);
    }

    public function test_getEmail(): void
    {
        $result = $this->object->getEmail('king@roll.com');
        self::assertIsArray($result);
        self::assertIsObject($result[0]);
    }

    public function test_getUpdated(): void
    {
        // Date for next method
        $today    = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->object->getUpdated($today, $tomorrow);
        self::assertIsObject($result);
    }

    public function test_createFile(): void
    {
        $file   = [
            'u_id'      => self::$userId,
            'filename'  => 'http://static.skaip.org/img/emoticons/180x180/f6fcff/penguin.gif',
            'name'      => 'имя файл жпг',
            'file_note' => 'extremal',
        ];
        $result = $this->object->createFile($file);
        self::assertIsObject($result);
    }

    public function test_update(): void
    {
        $result = $this->object->update(self::$userId, $this->user);
        self::assertIsObject($result);
    }

}
