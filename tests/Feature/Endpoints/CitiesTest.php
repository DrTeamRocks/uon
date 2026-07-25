<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Cities;
use Uon\Tests\TestCase;

class CitiesTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Cities::class)->create(['name' => 'Test City']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/city/create.json');
    }

    public function test_all(): void
    {
        $result = $this->make(Cities::class)->all(1, 2);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/cities/1/2.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Cities::class)->update(4, ['name' => 'Renamed']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/city/update/4.json');
    }
}
