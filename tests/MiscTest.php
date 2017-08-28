<?php
use PHPUnit\Framework\TestCase;

class MiscTest extends TestCase
{
    private $_misc;
    private $_avia;
    private $_call;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_misc = new \UON\Misc();
        $this->_avia = array(
            'service_id' => 1
        );
        $this->_call = array(
            'phone' => '123456789',
            'start' => date('Y-m-d H:i:s')
        );
    }

    public function testCreateAvia()
    {
        $result = $this->_misc->createAvia($this->_avia);
        $this->assertTrue(is_array($result));
    }

    public function testCreateCall()
    {
        $result = $this->_misc->createCall($this->_call);
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $result = $this->_misc->getCash();
        $this->assertTrue(is_array($result));

        $result = $this->_misc->getCurrency();
        $this->assertTrue(is_array($result));

        $result = $this->_misc->getManagers();
        $this->assertTrue(is_array($result));
    }

}
