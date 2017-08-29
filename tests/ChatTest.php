<?php namespace UON;

use PHPUnit\Framework\TestCase;

class ChatTest extends TestCase
{
    private $_chats;
    private $_chat;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_chats = new \UON\Chat();
        $this->_chat = array(
            'user_id_from' => '1',
            'user_id_to' => '1',
            'text' => 'chat message text'
        );
    }

    public function testCreate()
    {
        $result = $this->_chats->create($this->_chat);
        $this->assertTrue(is_array($result));
    }
}
