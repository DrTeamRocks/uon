<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Offices;
use Uon\Tests\TestCase;

class OfficesTest extends TestCase
{
    public function test_all(): void
    {
        $result = $this->make(Offices::class)->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/company-office.json');
    }
}
