<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Payments;

class PaymentsTest extends TestCase
{
    private $_payments;
    private $_payment;
    public static $paymentId;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_payments = new Payments($config);
        $this->_payment = array(
            'r_id' => '1',
            'type_id' => '1',
            'cio_id' => '1'
        );
    }

    public function testCreate()
    {
        $result = $this->_payments->create($this->_payment);
        self::$paymentId = $result['message']->id;
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_payments->get(self::$paymentId);
        $this->assertInternalType('array', $result);

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_payments->all($today, $tomorrow);
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $result = $this->_payments->update(self::$paymentId, $this->_payment);
        $this->assertInternalType('array', $result);
    }

    public function testDelete()
    {
        $result = $this->_payments->delete(self::$paymentId);
        $this->assertInternalType('array', $result);
    }
}
