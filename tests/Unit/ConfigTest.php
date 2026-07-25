<?php

namespace Uon\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Exceptions\UonParameterNotAllowedException;
use Uon\Exceptions\UonParameterNotSetException;

class ConfigTest extends TestCase
{
    public function test_all_returns_array(): void
    {
        $config = new Config();

        self::assertIsArray($config->all());
    }

    public function test_construct(): void
    {
        $config = new Config();

        self::assertInstanceOf(Config::class, $config);
    }

    public function test_set_rejects_unknown_parameter(): void
    {
        $this->expectException(UonParameterNotAllowedException::class);

        new Config(['dummy' => 'dummy']);
    }

    public function test_set_is_fluent(): void
    {
        $config = new Config();

        self::assertInstanceOf(Config::class, $config->set('token', 'test-token'));
        self::assertSame('test-token', $config->get('token'));
    }

    public function test_guzzle_contains_expected_keys(): void
    {
        $config        = new Config();
        $config->token = 'test-token';

        $options = $config->guzzle();

        self::assertIsArray($options);
        self::assertArrayHasKey('timeout', $options);
        self::assertArrayHasKey('headers', $options);
    }

    public function test_get_returns_default_value(): void
    {
        $config = new Config();

        self::assertSame(10, $config->get('seconds'));
    }

    public function test_guzzle_passes_verify_when_set(): void
    {
        $config = new Config([
            'token'  => 'test-token',
            'verify' => false,
        ]);

        self::assertArrayHasKey('verify', $config->guzzle());
        self::assertFalse($config->guzzle()['verify']);
    }

    public function test_guzzle_omits_verify_by_default(): void
    {
        $config = new Config(['token' => 'test-token']);

        self::assertArrayNotHasKey('verify', $config->guzzle());
    }

    public function test_get_unknown_parameter_throws(): void
    {
        $this->expectException(UonParameterNotSetException::class);

        (new Config())->get('dummy');
    }
}
