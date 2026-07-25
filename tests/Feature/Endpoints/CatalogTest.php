<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Catalog;
use Uon\Tests\TestCase;

class CatalogTest extends TestCase
{
    public function test_get(): void
    {
        $result = $this->make(Catalog::class)->get(2);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/catalog-service/2.json');
    }

    public function test_create(): void
    {
        $result = $this->make(Catalog::class)->create(['c_id' => 1, 'koef' => 1.5]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/catalog-service/create.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Catalog::class)->update(3, ['koef' => 2.0]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/catalog-service/update/3.json');
    }
}
