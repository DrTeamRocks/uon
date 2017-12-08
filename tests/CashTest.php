<?php namespace UON;

use PHPUnit\Framework\TestCase;

class CashTest extends TestCase
{
    private $_cash;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";
        $this->_cash = new Cash();
    }

    public function testCreate()
    {
        $result = $this->_cash->create(['name' => 'test']);
        $this->assertTrue(is_array($result));
    }

    public function testGet()
    {
        $result = $this->_cash->get();
        $this->assertTrue(is_array($result));

        $result = $this->_cash->get(['name' => 'test']);
        $this->assertTrue(is_array($result));
    }
}
