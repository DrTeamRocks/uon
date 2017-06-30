<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Reminders.php');

use PHPUnit\Framework\TestCase;

class RemindersTest extends TestCase
{
    private $_config;
    private $_token;
    private $_reminders;
    private $reminder;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_reminders = new \UON\Reminders($this->_token);

        $this->reminder = array(
            'r_id' => '1',
            'type_id' => '1',
            'datetime' => date('Y-m-d H:i:s'),
            'text' => 'some cool text of reminder'
        );
    }


    public function testCRUD()
    {
        /**
         * Create
         */
        $create = $this->_reminders->create($this->reminder);
        $this->assertTrue(is_array($create));

        /**
         * Read
         */
        $result = $this->_reminders->get($create['message']->id);
        $this->assertTrue(is_array($result));
    }
}
