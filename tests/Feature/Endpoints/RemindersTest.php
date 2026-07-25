<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Reminders;
use Uon\Tests\TestCase;

class RemindersTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Reminders::class)->create(['text' => 'Call client']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/reminder/create.json');
    }

    public function test_all(): void
    {
        $result = $this->make(Reminders::class)->all(2);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/reminder/2.json');
    }

    public function test_get(): void
    {
        $result = $this->make(Reminders::class)->get(5);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/reminder/5.json');
    }
}
