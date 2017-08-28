<?php
use PHPUnit\Framework\TestCase;

class PaymentsTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_payments;
    private $_payment;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_payments = new \UON\Payments();
        $this->_payment = array(
            'r_id' => '1',
            'type_id' => '1',
            'cio_id' => '1'
        );
    }

    public function testCreate()
    {
        $result = $this->_payments->create($this->_payment);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_payments->get($id);
        $this->assertTrue(is_array($result));

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_payments->all($today, $tomorrow);
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_payments->update($id, $this->_payment);
        $this->assertTrue(is_array($result));
    }

    public function testDelete()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_payments->delete($id);
        $this->assertTrue(is_array($result));
    }
}
