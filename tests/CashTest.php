<?php

use UON\Cash;
use PHPUnit\Framework\TestCase;

class CashTest extends TestCase
{
    public $_cash;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_cash = new \UON\Cash();
    }

    public function testCreate()
    {
        $result = $this->_cash->create(['name' => 'test']);
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $result = $this->_cash->get();
        $this->assertTrue(is_array($result));
    }
}
