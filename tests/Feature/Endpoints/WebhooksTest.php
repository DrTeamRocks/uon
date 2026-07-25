<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Webhooks;
use Uon\Tests\TestCase;

class WebhooksTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Webhooks::class)->create(['url' => 'https://example.com/hook']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/webhook/create.json');
    }

    public function test_all(): void
    {
        $result = $this->make(Webhooks::class)->all(2);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/webhook/2.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Webhooks::class)->update(3, ['url' => 'https://example.com/new']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/webhook/update/3.json');
    }

    public function test_delete(): void
    {
        $result = $this->make(Webhooks::class)->delete(3);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/webhook/delete/3.json');
    }
}
