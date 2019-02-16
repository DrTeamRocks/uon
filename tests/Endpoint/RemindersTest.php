<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Reminders;

class RemindersTest extends TestCase
{
    private $_reminders;
    private $_reminder;
    public static $reminderId;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_reminders = new Reminders($config);
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
        self::$reminderId = $result['message']->id;
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_reminders->get(self::$reminderId);
        $this->assertInternalType('array', $result);
    }

}
