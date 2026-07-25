<?php

namespace Uon\Tests\Unit;

use Uon\Client;
use Uon\Endpoints\Cash;
use Uon\Endpoints\Currencies;
use Uon\Tests\TestCase;

class ClientTest extends TestCase
{
    public function test_construct_from_config(): void
    {
        $client = new Client($this->mockConfig());

        self::assertInstanceOf(Client::class, $client);
    }

    public function test_construct_from_array(): void
    {
        $client = new Client(['token' => 'test-token']);

        self::assertInstanceOf(Client::class, $client);
    }

    public function test_magic_getter_resolves_endpoints(): void
    {
        $client = new Client($this->mockConfig());

        self::assertInstanceOf(Cash::class, $client->cash);
        self::assertInstanceOf(Currencies::class, $client->currencies);
    }

    public function test_isset_returns_false_for_unknown_property(): void
    {
        $client = new Client($this->mockConfig());

        self::assertFalse(isset($client->dummy));
    }

    public function test_endpoint_performs_request(): void
    {
        $client = new Client($this->mockConfig());

        $result = $client->currencies->all();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/currency.json');
    }
}
