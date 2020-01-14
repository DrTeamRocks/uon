<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Nutrition;

class NutritionTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Nutrition
     */
    private $object;

    /**
     * @var array
     */
    private $nutrition = [
        'name'    => 'Хавчик',
        'name_en' => 'Yammi'
    ];

    /**
     * @var int
     */
    public static $nutritionId;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Nutrition($config);
    }

    public function testCreate(): void
    {
        $result            = $this->object->create($this->nutrition);
        self::$nutritionId = $result->id;
        $this->assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->all();
        $this->assertIsObject($result);
    }

    public function testUpdate(): void
    {
        $result = $this->object->update(self::$nutritionId, $this->nutrition);
        $this->assertIsObject($result);
    }

}
