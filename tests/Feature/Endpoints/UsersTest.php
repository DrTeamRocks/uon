<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Users;
use Uon\Tests\TestCase;

class UsersTest extends TestCase
{
    public function test_all(): void
    {
        $result = $this->make(Users::class)->all(2);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/users/2.json');
    }

    public function test_get(): void
    {
        $result = $this->make(Users::class)->get(5);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/user/5.json');
    }

    public function test_search(): void
    {
        $result = $this->make(Users::class)->search(['phone' => '123']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/user/search.json');
    }

    public function test_get_label(): void
    {
        $result = $this->make(Users::class)->getLabel();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/user-label.json');
    }

    public function test_get_phone(): void
    {
        $result = $this->make(Users::class)->getPhone('123456789');

        self::assertIsObject($result);
        $this->assertRequest('GET', '/user/phone/123456789.json');
    }

    public function test_get_email(): void
    {
        $result = $this->make(Users::class)->getEmail('king@roll.com');

        self::assertIsObject($result);
        $this->assertRequest('POST', '/user/email.json');
    }

    public function test_get_updated(): void
    {
        $result = $this->make(Users::class)->getUpdated('2026-01-01', '2026-01-02');

        self::assertIsObject($result);
        $this->assertRequest('GET', '/user/updated/2026-01-01/2026-01-02/1.json');
    }

    public function test_create(): void
    {
        $result = $this->make(Users::class)->create(['u_name' => 'Test']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/user/create.json');
    }

    public function test_create_file(): void
    {
        $result = $this->make(Users::class)->createFile(['u_id' => 1]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/user-file/create.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Users::class)->update(5, ['u_name' => 'Renamed']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/user/update/5.json');
    }
}
