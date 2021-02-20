<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Payments;

class PaymentsTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Payments
     */
    private $object;

    /**
     * @var array
     */
    private $payment = [
        'r_id'    => 1,
        'type_id' => 1,
        'cio_id'  => 1
    ];

    /**
     * @var int
     */
    public static $paymentId;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->object = new Payments($config);
    }

    public function test_create(): void
    {
        $result          = $this->object->create($this->payment);
        self::$paymentId = $result->id;
        self::assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->get(self::$paymentId);
        self::assertIsObject($result);

        // Date for next method
        $today    = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->object->all($today, $tomorrow);
        self::assertIsObject($result);
    }

    public function test_update(): void
    {
        $result = $this->object->update(self::$paymentId, $this->payment);
        self::assertIsObject($result);
    }

    public function test_delete(): void
    {
        $result = $this->object->delete(self::$paymentId);
        self::assertIsObject($result);
    }
}
