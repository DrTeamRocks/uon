<?php
use PHPUnit\Framework\TestCase;

class ServicesTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_services;
    private $_service;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_services = new \UON\Services();
        $this->_service = array(
            'r_id' => '1',
            'type_id' => '1'
        );
    }

    public function testCreate()
    {
        $result = $this->_services->create($this->_service);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $result = $this->_services->getTypes();
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_services->update($id, $this->_service);
        $this->assertTrue(is_array($result));
    }
}
