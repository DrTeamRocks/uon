<?php

namespace UON\Tests\Unit;

use PHPUnit\Framework\TestCase;
use UON\Client;

class ClientTest extends TestCase
{
    /**
     * @var string
     */
    private $token;

    public function setUp()
    {
        $this->token = getenv('API_TOKEN');
    }

    public function test__construct(): void
    {
        $obj = new Client(['token' => $this->token]);
        $this->assertIsObject($obj);
        $this->assertInstanceOf(Client::class, $obj);
    }

    public function test__get(): void
    {
        $obj = new Client(['token' => $this->token]);
        $this->assertInstanceOf(\UON\Endpoints\Cash::class, $obj->cash);
    }

    public function test__set(): void
    {
        $obj = new Client(['token' => $this->token]);
        $obj->cash->get()->exec();
        $this->assertInstanceOf(\UON\Endpoints\Cash::class, $obj->cash);
    }

    public function test__isset(): void
    {
        $obj = new Client(['token' => $this->token]);
        $this->assertFalse(isset($obj->dummy));
    }

}
