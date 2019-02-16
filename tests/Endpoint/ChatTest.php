<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Chat;

class ChatTest extends TestCase
{
    private $_chats;
    private $_chat;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_chats = new Chat($config);
        $this->_chat = array(
            'user_id_from' => '1',
            'user_id_to' => '1',
            'text' => 'chat message text'
        );
    }

    public function testCreate()
    {
        $result = $this->_chats->create($this->_chat);
        $this->assertInternalType('array', $result);
    }
}
