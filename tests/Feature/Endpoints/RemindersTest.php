<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Reminders;

class RemindersTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Reminders
     */
    private $object;

    /**
     * @var array
     */
    private $reminder = [
        'r_id'    => 1,
        'type_id' => 1,
        'text'    => 'some cool text of reminder'
    ];

    /**
     * @var int
     */
    public static $reminderId;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->object = new Reminders($config);

        // Fix datetime
        $this->reminder['datetime'] = date('Y-m-d H:i:s');
    }

    public function test_create(): void
    {
        $result           = $this->object->create($this->reminder);
        self::$reminderId = $result->id;
        self::assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->get(self::$reminderId);
        self::assertIsObject($result);
    }

}
