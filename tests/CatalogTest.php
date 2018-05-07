<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Catalog;
use UON\Endpoint\Services;

class CatalogTest extends TestCase
{
    private $_file;
    private $_catalog;
    private $_services;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/_token.txt'));

        $this->_file = __DIR__ . '/_tmp.txt';
        $this->_catalog = new Catalog($config);
        $this->_services = new Services($config);
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
        $this->assertInternalType('array', $result);
    }

    public function testGet()
    {
        $result = $this->_catalog->get();
        $this->assertInternalType('array', $result);

        $result = $this->_catalog->get(1);
        $this->assertInternalType('array', $result);
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
        $this->assertInternalType('array', $result);
    }
}
