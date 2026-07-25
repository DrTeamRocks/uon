<?php

namespace Uon\Tests;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Psr\Http\Message\RequestInterface;
use stdClass;
use Uon\Config;

use function end;
use function json_encode;

/**
 * Base test case which wires the client to an in-memory Guzzle mock handler.
 *
 * The whole suite runs offline and deterministically without touching the real
 * U-On API. Each endpoint under test receives a config with a mocked transport,
 * while every outgoing request is captured for later assertions.
 */
abstract class TestCase extends BaseTestCase
{
    /**
     * History of requests captured by the mock handler.
     *
     * @var array<int, array{request: RequestInterface}>
     */
    protected array $history = [];

    /**
     * Build a Config wired to a Guzzle mock handler.
     *
     * @param int $responses How many canned responses to queue for this config.
     */
    protected function mockConfig(int $responses = 1): Config
    {
        $queue = [];
        for ($i = 0; $i < $responses; $i++) {
            $queue[] = $this->jsonResponse();
        }

        $stack = HandlerStack::create(new MockHandler($queue));
        $stack->push(Middleware::history($this->history));

        return new Config([
            'token'   => 'test-token',
            'handler' => $stack,
        ]);
    }

    /**
     * Instantiate an endpoint class wired to a fresh mocked transport.
     *
     * @template T of \Uon\Client
     *
     * @param class-string<T> $class
     *
     * @return T
     */
    protected function make(string $class): object
    {
        return new $class($this->mockConfig());
    }

    /**
     * Build a JSON response whose body decodes to an object.
     *
     * @param array $body   Payload to encode (an empty array means an empty object).
     * @param int   $status HTTP status code.
     */
    protected function jsonResponse(array $body = [], int $status = 200): Response
    {
        $payload = [] === $body ? new stdClass() : $body;

        return new Response($status, ['Content-Type' => 'application/json'], json_encode($payload));
    }

    /**
     * Return the last request captured by the history middleware.
     */
    protected function lastRequest(): RequestInterface
    {
        $last = end($this->history);

        return $last['request'];
    }

    /**
     * Assert that the last request used the given HTTP method and its URI
     * contains the given needle (usually the endpoint path with format).
     */
    protected function assertRequest(string $method, string $needle): void
    {
        $request = $this->lastRequest();

        self::assertSame($method, $request->getMethod());
        self::assertStringContainsString($needle, (string) $request->getUri());
    }
}
