<?php

namespace Uon\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Uon\Config;

class ConfigTest extends TestCase
{
    public function testAll(): void
    {
        $obj = new Config();
        self::assertIsArray($obj->all());
    }

    public function test__construct(): void
    {
        $obj = new Config();
        self::assertIsObject($obj);
        self::assertInstanceOf(Config::class, $obj);
    }

    public function testSet(): void
    {
        $this->expectException(\ErrorException::class);
        $obj = new Config(['dummy' => 'dummy']);
    }

    public function testGuzzle(): void
    {
        $obj        = new Config();
        $obj->token = 'test';
        $array      = $obj->guzzle();

        self::assertIsArray($array);
        self::assertArrayHasKey('timeout', $array);
    }

    public function testGet(): void
    {
        $this->expectException(\ErrorException::class);
        $obj = new Config();
        self::assertEquals(10, $obj->get('seconds'));
        self::assertNull($obj->get('dummy'));
    }
}
