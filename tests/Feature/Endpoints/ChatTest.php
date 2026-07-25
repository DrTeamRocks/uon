<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Chat;
use Uon\Tests\TestCase;

class ChatTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Chat::class)->create(['text' => 'hello']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/chat-message/create.json');
    }
}
