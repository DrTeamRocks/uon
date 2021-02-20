<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Sources;

class SourcesTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Sources
     */
    private $object;

    /**
     * @var array
     */
    private $source = [
        'rs_name' => 'source name',
    ];

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->object = new Sources($config);
    }

    public function test_create(): void
    {
        $result = $this->object->create($this->source);
        self::assertIsObject($result);
    }

    public function test_all(): void
    {
        $result = $this->object->all();
        self::assertIsObject($result);
    }
}
