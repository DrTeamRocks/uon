<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Services;
use Uon\Tests\TestCase;

class ServicesTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Services::class)->create(['c_id' => 1, 'koef' => 1.5, 'price' => 1000]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/service/create.json');
    }

    public function test_get_types(): void
    {
        $result = $this->make(Services::class)->getTypes();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/service_type.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Services::class)->update(5, ['price' => 2000]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/service/update/5.json');
    }
}
