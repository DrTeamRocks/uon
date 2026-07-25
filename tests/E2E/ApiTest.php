<?php

namespace Uon\Tests\E2E;

use PHPUnit\Framework\TestCase;
use Uon\Client;

/**
 * End-to-end tests against the real U-On Travel API.
 *
 * They run only when the UON_API_TOKEN environment variable is provided
 * (for example as a CI secret). Without a token every test is skipped, so the
 * suite stays green on forks and local machines. Only read-only GET endpoints
 * are used here on purpose, to avoid mutating data in a real account.
 */
class ApiTest extends TestCase
{
    /**
     * @var \Uon\Client|null
     */
    private $client;

    protected function setUp(): void
    {
        $token = getenv('UON_API_TOKEN');

        if (empty($token)) {
            self::markTestSkipped('UON_API_TOKEN is not set, skipping end-to-end tests.');
        }

        $this->client = new Client([
            'token'   => $token,
            'timeout' => 20,
        ]);
    }

    public function test_currencies_all(): void
    {
        $result = $this->client->currencies->all();

        self::assertNotNull($result);
    }

    public function test_countries_all(): void
    {
        $result = $this->client->countries->all();

        self::assertNotNull($result);
    }

    public function test_managers_all(): void
    {
        $result = $this->client->managers->all();

        self::assertNotNull($result);
    }
}
