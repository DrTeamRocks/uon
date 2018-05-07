<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Nutrition;

class NutritionTest extends TestCase
{
    private $_file;
    private $_nutritions;
    private $_nutrition;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/_token.txt'));

        $this->_file = __DIR__ . '/_tmp.txt';
        $this->_nutritions = new Nutrition($config);
        $this->_nutrition = array(
            'name' => 'Хавчик',
            'name_en' => 'Yammi'
        );
    }

    public function testCreate()
    {
        $result = $this->_nutritions->create($this->_nutrition);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_nutritions->all();
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_nutritions->update($id);
        $this->assertInternalType('array', $result);
    }

}
