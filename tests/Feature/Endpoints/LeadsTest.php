<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Leads;
use Uon\Tests\TestCase;

class LeadsTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Leads::class)->create(['u_name' => 'Test']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/lead/create.json');
    }

    public function test_get(): void
    {
        $result = $this->make(Leads::class)->get(5);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/lead/5.json');
    }

    public function test_get_by_client(): void
    {
        $result = $this->make(Leads::class)->getByClient(1, 2);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/lead-by-client/1/2.json');
    }

    public function test_get_date(): void
    {
        $result = $this->make(Leads::class)->getDate('2026-01-01', '2026-01-02');

        self::assertIsObject($result);
        $this->assertRequest('GET', '/leads/2026-01-01/2026-01-02/1.json');
    }

    public function test_get_date_with_source(): void
    {
        $result = $this->make(Leads::class)->getDate('2026-01-01', '2026-01-02', 1, 7);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/leads/2026-01-01/2026-01-02/7/1.json');
    }

    public function test_search(): void
    {
        $result = $this->make(Leads::class)->search(['phone' => '123']);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/lead/search.json');
    }
}
