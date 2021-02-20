<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Chat;

class ChatTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Chat
     */
    private $chat;

    /**
     * @var array
     */
    private $message = [
        'user_id_from' => 1,
        'user_id_to'   => 1,
        'text'         => 'chat message text',
    ];

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->chat = new Chat($config);
    }

    public function test_create(): void
    {
        $result = $this->chat->create($this->message);
        self::assertIsObject($result);
    }
}
