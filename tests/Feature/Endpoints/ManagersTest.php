<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Managers;
use Uon\Tests\TestCase;

class ManagersTest extends TestCase
{
    public function test_all(): void
    {
        $result = $this->make(Managers::class)->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/manager.json');
    }
}
