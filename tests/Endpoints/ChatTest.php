<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Chat;

class ChatTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Chat
     */
    private $object;

    /**
     * @var array
     */
    private $chat = [
        'user_id_from' => 1,
        'user_id_to'   => 1,
        'text'         => 'chat message text'
    ];

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Chat($config);
    }

    public function testCreate(): void
    {
        $result = $this->object->create($this->chat);
        $this->assertIsObject($result);
    }
}
