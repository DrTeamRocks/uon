<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Suppliers.php');

use PHPUnit\Framework\TestCase;

class SuppliersTest extends TestCase
{
    private $_config;
    private $_token;
    private $_suppliers;
    private $supplier;
    private $supplierType;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_suppliers = new \UON\Suppliers($this->_token);

        $this->supplier = array(
            'name' => 'supplier name',
            'type_id' => '1'
        );

        $this->supplierType = array(
            'name' => 'supplier type name',
        );
    }

    public function testCRUD()
    {
        /**
         * Create
         */
        $create = $this->_suppliers->create($this->supplier);
        $this->assertTrue(is_array($create));

        $createType = $this->_suppliers->createType($this->supplierType);
        $this->assertTrue(is_array($createType));

        /**
         * Update
         */
        $update = $this->_suppliers->update($create['message']->id, $this->supplier);
        $this->assertTrue(is_array($update));

        /**
         * Read
         */
        $result = $this->_suppliers->all();
        $this->assertTrue(is_array($result));

        $result = $this->_suppliers->get($create['message']->id);
        $this->assertTrue(is_array($result));

        $result = $this->_suppliers->getType(array('id' => $createType['message']->id));
        $this->assertTrue(is_array($result));
    }
}
