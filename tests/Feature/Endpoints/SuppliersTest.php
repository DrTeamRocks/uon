<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Suppliers;
use Uon\Tests\TestCase;

class SuppliersTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Suppliers::class)->create(['name' => 'Supplier']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/supplier/create.json');
    }

    public function test_create_type(): void
    {
        $result = $this->make(Suppliers::class)->createType(['name' => 'Type']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/supplier_type/create.json');
    }

    public function test_all(): void
    {
        $result = $this->make(Suppliers::class)->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/suppliers/1.json');
    }

    public function test_get(): void
    {
        $result = $this->make(Suppliers::class)->get(5);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/suppliers/5.json');
    }

    public function test_get_types(): void
    {
        $result = $this->make(Suppliers::class)->getTypes();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/supplier_type.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Suppliers::class)->update(5, ['name' => 'Renamed']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/supplier/update/5.json');
    }
}
