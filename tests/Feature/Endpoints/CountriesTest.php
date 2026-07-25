<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Countries;
use Uon\Tests\TestCase;

class CountriesTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Countries::class)->create(['name' => 'Test Country']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/country/create.json');
    }

    public function test_all(): void
    {
        $result = $this->make(Countries::class)->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/countries.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Countries::class)->update(5, ['name' => 'Renamed']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/country/update/5.json');
    }
}
