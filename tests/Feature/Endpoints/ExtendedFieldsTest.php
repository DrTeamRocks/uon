<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\ExtendedFields;
use Uon\Tests\TestCase;

class ExtendedFieldsTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(ExtendedFields::class)->create(['name' => 'Field']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/extended_field/create.json');
    }

    public function test_all(): void
    {
        $result = $this->make(ExtendedFields::class)->all(2);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/extended_field/2.json');
    }

    public function test_update(): void
    {
        $result = $this->make(ExtendedFields::class)->update(3, ['name' => 'Renamed']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/extended_field/update/3.json');
    }

    public function test_delete(): void
    {
        $result = $this->make(ExtendedFields::class)->delete(3);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/extended_field/delete/3.json');
    }
}
