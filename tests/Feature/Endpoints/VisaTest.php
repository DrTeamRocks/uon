<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Visa;
use Uon\Tests\TestCase;

class VisaTest extends TestCase
{
    public function test_all(): void
    {
        $result = $this->make(Visa::class)->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/visa.json');
    }
}
