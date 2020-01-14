<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Reminders;

class RemindersTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Reminders
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
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Reminders($config);

        // Fix datetime
        $this->reminder['datetime'] = date('Y-m-d H:i:s');
    }

    public function testCreate(): void
    {
        $result           = $this->object->create($this->reminder);
        self::$reminderId = $result->id;
        $this->assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->get(self::$reminderId);
        $this->assertIsObject($result);
    }

}
