<?php

namespace Uon\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Uon\Client;
use Uon\Endpoints\Cash;

class ClientTest extends TestCase
{
    /**
     * @var string
     */
    private $token;

    public function setUp(): void
    {
        $this->token = getenv('API_TOKEN');
    }

    public function test__construct(): void
    {
        $obj = new Client(['token' => $this->token]);
        self::assertIsObject($obj);
        self::assertInstanceOf(Client::class, $obj);
    }

    public function test_get(): void
    {
        $obj = new Client(['token' => $this->token]);
        self::assertInstanceOf(Cash::class, $obj->cash);
    }

//    public function test_call(): void
//    {
//        $obj = new Client(['token' => $this->token]);
//        $test = $obj->cash->get();
//        self::assertInstanceOf(Cash::class, $obj->cash);
//    }

    public function test_isset(): void
    {
        $obj = new Client(['token' => $this->token]);
        self::assertFalse(isset($obj->dummy));
    }
}
