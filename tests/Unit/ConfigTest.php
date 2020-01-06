<?php

namespace UON\Tests\Unit;

use PHPUnit\Framework\TestCase;
use UON\Config;

class ConfigTest extends TestCase
{

    public function testAll(): void
    {
        $obj = new Config();
        $this->assertIsArray($obj->all());
    }

    public function test__construct(): void
    {
        $obj = new Config();
        $this->assertIsObject($obj);
        $this->assertInstanceOf(Config::class, $obj);
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

        $this->assertIsArray($array);
        $this->assertArrayHasKey('timeout', $array);
    }

    public function testGet(): void
    {
        $this->expectException(\ErrorException::class);
        $obj = new Config();
        $this->assertEquals(10, $obj->get('seconds'));
        $this->assertNull($obj->get('dummy'));
    }

}
