<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\ReasonsDeny;
use Uon\Tests\TestCase;

class ReasonsDenyTest extends TestCase
{
    public function test_all(): void
    {
        $result = $this->make(ReasonsDeny::class)->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/reason_deny.json');
    }
}
