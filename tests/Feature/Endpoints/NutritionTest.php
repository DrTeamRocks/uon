<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Nutrition;

class NutritionTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Nutrition
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
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->object = new Nutrition($config);
    }

    public function test_create(): void
    {
        $result            = $this->object->create($this->nutrition);
        self::$nutritionId = $result->id;
        self::assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->all();
        self::assertIsObject($result);
    }

    public function test_update(): void
    {
        $result = $this->object->update(self::$nutritionId, $this->nutrition);
        self::assertIsObject($result);
    }

}
