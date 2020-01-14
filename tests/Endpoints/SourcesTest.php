<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Sources;

class SourcesTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Sources
     */
    private $object;

    /**
     * @var array
     */
    private $source = [
        'rs_name' => 'source name'
    ];

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Sources($config);
    }

    public function testCreate()
    {
        $result = $this->object->create($this->source);
        $this->assertIsObject($result);
    }

    public function testRead()
    {
        $result = $this->object->all();
        $this->assertIsObject($result);
    }
}
