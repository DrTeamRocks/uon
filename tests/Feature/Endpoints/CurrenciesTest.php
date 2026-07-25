<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Currencies;
use Uon\Tests\TestCase;

class CurrenciesTest extends TestCase
{
    public function test_all(): void
    {
        $result = $this->make(Currencies::class)->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/currency.json');
    }
}
