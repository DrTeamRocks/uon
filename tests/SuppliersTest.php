<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Suppliers.php');

use PHPUnit\Framework\TestCase;

class SuppliersTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_suppliers;
    private $_supplier;
    private $_supplierType;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_suppliers = new \UON\Suppliers();
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
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $result = $this->_suppliers->all();
        $this->assertTrue(is_array($result));

        $id = file_get_contents($this->_file);
        $result = $this->_suppliers->get($id);
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $update = $this->_suppliers->update($id, $this->_supplier);
        $this->assertTrue(is_array($update));
    }

    public function testCreateType()
    {
        $result = $this->_suppliers->createType($this->_supplierType);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testReadType()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_suppliers->getTypes(array('id' => $id));
        $this->assertTrue(is_array($result));
    }
}
