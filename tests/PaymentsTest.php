<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Payments.php');

use PHPUnit\Framework\TestCase;

class PaymentsTest extends TestCase
{
    private $_config;
    private $_token;
    private $_payments;
    private $payment;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_payments = new \UON\Payments($this->_token);

        $this->payment = array(
            'r_id' => '1',
            'type_id' => '1',
            'cio_id' => '1'
        );
    }

    public function testCRUD()
    {
        /**
         * Create
         */
        $create = $this->_payments->create($this->payment);
        $this->assertTrue(is_array($create));

        /**
         * Read
         */
        $result = $this->_payments->get($create['message']->id);
        $this->assertTrue(is_array($result));

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_payments->all($today, $tomorrow);
        $this->assertTrue(is_array($result));

        /**
         * Update
         */
        $update = $this->_payments->update($create['message']->id, $this->payment);
        $this->assertTrue(is_array($update));

        /**
         * Delete
         */
        $update = $this->_payments->delete($create['message']->id);
        $this->assertTrue(is_array($update));
    }
}
