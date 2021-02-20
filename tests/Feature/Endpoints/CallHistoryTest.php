<?php

namespace Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\CallHistory;

class CallHistoryTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\CallHistory
     */
    private $callHistory;

    /**
     * @var array
     */
    private $call = [
        'phone' => '123456789',
    ];

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->callHistory = new CallHistory($config);

        $this->call['start'] = date('Y-m-d H:i:s');
    }

    public function test_create(): void
    {
        $result = $this->callHistory->create($this->call);
        self::assertIsObject($result);
    }
}
