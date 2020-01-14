<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Payments;

class PaymentsTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Payments
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
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Payments($config);
    }

    public function testCreate(): void
    {
        $result          = $this->object->create($this->payment);
        self::$paymentId = $result->id;
        $this->assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->get(self::$paymentId);
        $this->assertIsObject($result);

        // Date for next method
        $today    = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->object->all($today, $tomorrow);
        $this->assertIsObject($result);
    }

    public function testUpdate(): void
    {
        $result = $this->object->update(self::$paymentId, $this->payment);
        $this->assertIsObject($result);
    }

    public function testDelete(): void
    {
        $result = $this->object->delete(self::$paymentId);
        $this->assertIsObject($result);
    }
}
