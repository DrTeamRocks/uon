<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Nutrition;
use Uon\Tests\TestCase;

class NutritionTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Nutrition::class)->create(['name' => 'All inclusive']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/nutrition/create.json');
    }

    public function test_all(): void
    {
        $result = $this->make(Nutrition::class)->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/nutrition.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Nutrition::class)->update(2, ['name' => 'Breakfast']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/nutrition/update/2.json');
    }
}
