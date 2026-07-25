<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Sources;
use Uon\Tests\TestCase;

class SourcesTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Sources::class)->create(['name' => 'Website']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/source/create.json');
    }

    public function test_all(): void
    {
        $result = $this->make(Sources::class)->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/source.json');
    }
}
