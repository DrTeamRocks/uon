<?php
use PHPUnit\Framework\TestCase;

class RemindersTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_reminders;
    private $_reminder;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_reminders = new \UON\Reminders();
        $this->_reminder = array(
            'r_id' => '1',
            'type_id' => '1',
            'datetime' => date('Y-m-d H:i:s'),
            'text' => 'some cool text of reminder'
        );
    }


    public function testCreate()
    {
        $result = $this->_reminders->create($this->_reminder);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_reminders->get($id);
        $this->assertTrue(is_array($result));
    }

}
