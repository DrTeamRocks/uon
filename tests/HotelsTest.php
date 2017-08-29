<?php
use PHPUnit\Framework\TestCase;

class HotelsTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_hotels;
    private $_hotel;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_hotels = new \UON\Hotels();
        $this->_hotel = [
            'name' => 'Кингконгстоунт',
            'name_en' => 'Kinkongstoun'
        ];
    }

    public function testCreate()
    {
        $result = $this->_hotels->create($this->_hotel);
        $this->assertTrue(is_array($result));

        // TODO: Remove this after bug will be fixed
        // Small bug, each second requests to system have a 0 into result
        if ($result['message']->id == 0) $result['message']->id = 2;

        file_put_contents($this->_file, $result['message']->id);
    }

    public function testRead()
    {
        $result = $this->_hotels->all('1');
        $this->assertTrue(is_array($result));

        $id = file_get_contents($this->_file);
        $result = $this->_hotels->get($id);
        $this->assertTrue(is_array($result));
    }

    public function testUpdate()
    {
        $id = file_get_contents($this->_file);
        $update = $this->_hotels->update($id, $this->_hotel);
        $this->assertTrue(is_array($update));
    }

    public function testDelete()
    {
        $id = file_get_contents($this->_file);
        $delete = $this->_hotels->delete($id);
        $this->assertTrue(is_array($delete));
    }
}
