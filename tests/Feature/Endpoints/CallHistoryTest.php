<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\CallHistory;
use Uon\Tests\TestCase;

class CallHistoryTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(CallHistory::class)->create(['phone' => '123456789']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/call_history/create.json');
    }
}
