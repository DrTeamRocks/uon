<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Hotels;
use Uon\Tests\TestCase;

class HotelsTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Hotels::class)->create(['name' => 'Test Hotel']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/hotel/create.json');
    }

    public function test_all(): void
    {
        $result = $this->make(Hotels::class)->all(2);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/hotels/2.json');
    }

    public function test_get(): void
    {
        $result = $this->make(Hotels::class)->get(5);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/hotel/5.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Hotels::class)->update(5, ['name' => 'Renamed']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/hotel/update/5.json');
    }

    public function test_delete(): void
    {
        $result = $this->make(Hotels::class)->delete(5);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/hotel/delete/5.json');
    }
}
