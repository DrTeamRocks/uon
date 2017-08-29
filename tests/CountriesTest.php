<?php
use PHPUnit\Framework\TestCase;

class CountriesTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_countries;
    private $_country;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_countries = new \UON\Countries();
        $this->_country = [
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        ];
    }

    public function testCreate()
    {
        $result = $this->_countries->create($this->_country);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $result = $this->_countries->all();
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_countries->update($id, $this->_country);
        $this->assertTrue(is_array($result));
    }

}
