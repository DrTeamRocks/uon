<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Nutrition;

class NutritionTest extends TestCase
{
    private $_nutritions;
    private $_nutrition;

    public static $nutritionId;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_nutritions = new Nutrition($config);
        $this->_nutrition = array(
            'name' => 'Хавчик',
            'name_en' => 'Yammi'
        );
    }

    public function testCreate()
    {
        $result = $this->_nutritions->create($this->_nutrition);
        self::$nutritionId = $result['message']->id;
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_nutritions->all();
        $this->assertInternalType('array', $result);
    }

    public function testUpdate()
    {
        $result = $this->_nutritions->update(self::$nutritionId);
        $this->assertInternalType('array', $result);
    }

}
