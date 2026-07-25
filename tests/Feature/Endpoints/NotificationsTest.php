<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Notifications;
use Uon\Tests\TestCase;

class NotificationsTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Notifications::class)->create(['text' => 'Notify']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/notification/create.json');
    }
}
