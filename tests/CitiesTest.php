<?php namespace UON;

use PHPUnit\Framework\TestCase;

class CitiesTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_cities;
    private $_city;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_cities = new \UON\Cities();
        $this->_city = array(
            'country_id' => '1',
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        );
    }

    public function testCreate()
    {
        $result = $this->_cities->create($this->_city);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $result = $this->_cities->all($this->_city['country_id']);
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $update = $this->_cities->update($id, $this->_city);
        $this->assertTrue(is_array($update));
    }

}
