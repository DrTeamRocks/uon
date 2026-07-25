<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Requests;
use Uon\Tests\TestCase;

class RequestsTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Requests::class)->create(['note' => 'Test', 'price' => 100000]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/request/create.json');
    }

    public function test_create_actions(): void
    {
        $result = $this->make(Requests::class)->createActions(['r_id' => 1, 'type_id' => 1]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/request-action/create.json');
    }

    public function test_create_file(): void
    {
        $result = $this->make(Requests::class)->createFile(['r_id' => 1]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/request-file/create.json');
    }

    public function test_create_tourist(): void
    {
        $result = $this->make(Requests::class)->createTourist(['r_id' => 1]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/tourists-requests/create.json');
    }

    public function test_search(): void
    {
        $result = $this->make(Requests::class)->search(['phone' => '123']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/request/search.json');
    }

    public function test_get(): void
    {
        $result = $this->make(Requests::class)->get(5);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/request/5.json');
    }

    public function test_get_actions(): void
    {
        $result = $this->make(Requests::class)->getActions(5);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/request-action/5.json');
    }

    public function test_get_by_client(): void
    {
        $result = $this->make(Requests::class)->getByClient(1, 2);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/request-by-client/1/2.json');
    }

    public function test_get_date(): void
    {
        $result = $this->make(Requests::class)->getDate('2026-01-01', '2026-01-02');

        self::assertIsObject($result);
        $this->assertRequest('GET', '/requests/2026-01-01/2026-01-02/1.json');
    }

    public function test_get_date_actions(): void
    {
        $result = $this->make(Requests::class)->getDateActions('2026-01-01', '2026-01-02');

        self::assertIsObject($result);
        $this->assertRequest('GET', '/request-action/2026-01-01/2026-01-02/1.json');
    }

    public function test_get_updated(): void
    {
        $result = $this->make(Requests::class)->getUpdated('2026-01-01', '2026-01-02');

        self::assertIsObject($result);
        $this->assertRequest('GET', '/requests/updated/2026-01-01/2026-01-02/1.json');
    }

    public function test_get_closed(): void
    {
        $result = $this->make(Requests::class)->getClosed('2026-01-01', '2026-01-02');

        self::assertIsObject($result);
        $this->assertRequest('GET', '/requests/closed/2026-01-01/2026-01-02/1.json');
    }

    public function test_get_travel_type(): void
    {
        $result = $this->make(Requests::class)->getTravelType();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/travel-type.json');
    }

    public function test_get_document(): void
    {
        $result = $this->make(Requests::class)->getDocument(['r_id' => 1]);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/request-document.json');
    }

    public function test_create_travel_type(): void
    {
        $result = $this->make(Requests::class)->createTravelType(['name' => 'test']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/travel-type/create.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Requests::class)->update(5, ['note' => 'Updated']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/request/update/5.json');
    }

    public function test_delete_file(): void
    {
        $result = $this->make(Requests::class)->deleteFile(5);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/request/delete/5.json');
    }

    public function test_delete_tourist(): void
    {
        $result = $this->make(Requests::class)->deleteTourist(['id' => 1]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/tourists-requests/delete.json');
    }
}
