<?php namespace UON;

use PHPUnit\Framework\TestCase;

class CatalogTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_catalog;
    private $_services;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";
        $this->_catalog = new Catalog();
        $this->_services = new Services();
    }

    public function testCreate()
    {
        $services = $this->_services->getTypes();
        $service_id = $services['message']->items[0]->id;
        $service_name = $services['message']->items[0]->name;

        $parameters = [
            's_id' => $service_id,
            'description' => 'dummy description of ' . $service_name,
            'price' => '999999'
        ];

        $result = $this->_catalog->create($parameters);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testGet()
    {
        $result = $this->_catalog->get();
        $this->assertTrue(is_array($result));

        $result = $this->_catalog->get(1);
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $services = $this->_services->getTypes();
        $service_id = $services['message']->items[0]->id;
        $service_name = $services['message']->items[0]->name;

        $parameters = [
            's_id' => $service_id,
            'description' => 'updated description of ' . $service_name,
            'price' => '999999'
        ];

        $id = file_get_contents($this->_file);
        $result = $this->_catalog->update($id, $parameters);
        $this->assertTrue(is_array($result));
    }
}
