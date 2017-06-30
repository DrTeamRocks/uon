<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Nutrition.php');

use PHPUnit\Framework\TestCase;

class NutritionTest extends TestCase
{
    private $_config;
    private $_token;
    private $_nutrition;
    private $nutrition;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_nutrition = new \UON\Nutrition($this->_token);

        $this->nutrition = array(
            'name' => 'Хавчик',
            'name_en' => 'Yammi'
        );
    }

    public function testCRUD()
    {
        /**
         * Create
         */
        $create = $this->_nutrition->create($this->nutrition);
        $this->assertTrue(is_array($create));

        /**
         * Read
         */
        $result = $this->_nutrition->all();
        $this->assertTrue(is_array($result));

        /**
         * Update
         */
        $update = $this->_nutrition->update($create['message']->id);
        $this->assertTrue(is_array($update));
    }
}
