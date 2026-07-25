<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Statuses;
use Uon\Tests\TestCase;

class StatusesTest extends TestCase
{
    public function test_get(): void
    {
        $result = $this->make(Statuses::class)->get();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/status.json');
    }

    public function test_get_lead(): void
    {
        $result = $this->make(Statuses::class)->getLead();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/status_lead.json');
    }
}
