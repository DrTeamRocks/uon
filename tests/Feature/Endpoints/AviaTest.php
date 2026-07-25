<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Avia;
use Uon\Tests\TestCase;

class AviaTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Avia::class)->create(['at_type' => 1]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/avia/create.json');
    }
}
