<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Bcard;
use Uon\Tests\TestCase;

class BcardTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Bcard::class)->create(['number' => '123']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/bcard/create.json');
    }

    public function test_activate(): void
    {
        $result = $this->make(Bcard::class)->activate(['number' => '123']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/bcard-activate/create.json');
    }

    public function test_create_bonus(): void
    {
        $result = $this->make(Bcard::class)->createBonus(['bonus' => 100]);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/bcard-bonus/create.json');
    }

    public function test_get_by_card(): void
    {
        $result = $this->make(Bcard::class)->getByCard(5);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/bcard-bonus-by-card/5.json');
    }

    public function test_get_by_user(): void
    {
        $result = $this->make(Bcard::class)->getByUser(7);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/bcard-bonus-by-user/7.json');
    }
}
