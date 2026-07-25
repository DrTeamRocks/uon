<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Cash;
use Uon\Tests\TestCase;

class CashTest extends TestCase
{
    public function test_get(): void
    {
        $result = $this->make(Cash::class)->get();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/cash.json');
    }

    public function test_get_filtered(): void
    {
        $result = $this->make(Cash::class)->get(['name' => 'test']);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/cash.json');
    }

    public function test_create(): void
    {
        $result = $this->make(Cash::class)->create(['name' => 'test']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/cash/create.json');
    }
}
