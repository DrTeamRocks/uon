<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Insurances;
use Uon\Tests\TestCase;

class InsurancesTest extends TestCase
{
    public function test_all(): void
    {
        $result = $this->make(Insurances::class)->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/insurance.json');
    }
}
