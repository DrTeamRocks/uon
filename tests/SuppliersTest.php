<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Suppliers;

class SuppliersTest extends TestCase
{
    private $_file;
    private $_suppliers;
    private $_supplier;
    private $_supplierType;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/_token.txt'));

        $this->_file = __DIR__ . '/_tmp.txt';
        $this->_suppliers = new Suppliers($config);
        $this->_supplier = array(
            'name' => 'supplier name',
            'type_id' => '1'
        );
        $this->_supplierType = array(
            'name' => 'supplier type name',
        );
    }

    public function testCreate()
    {
        $result = $this->_suppliers->create($this->_supplier);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_suppliers->all();
        $this->assertInternalType('array', $result);

        $id = file_get_contents($this->_file);
        $result = $this->_suppliers->get($id);
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $update = $this->_suppliers->update($id, $this->_supplier);
        $this->assertInternalType('array', $update);
    }

    public function testCreateType()
    {
        $result = $this->_suppliers->createType($this->_supplierType);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertInternalType('array', $result);
    }

    public function testReadType()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_suppliers->getTypes(array('id' => $id));
        $this->assertInternalType('array', $result);
    }
}
