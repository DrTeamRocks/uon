<?php
use PHPUnit\Framework\TestCase;

class NutritionTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_nutritions;
    private $_nutrition;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_nutritions = new \UON\Nutrition();
        $this->_nutrition = array(
            'name' => 'Хавчик',
            'name_en' => 'Yammi'
        );
    }

    public function testCreate()
    {
        $result = $this->_nutritions->create($this->_nutrition);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $result = $this->_nutritions->all();
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_nutritions->update($id);
        $this->assertTrue(is_array($result));
    }

}
