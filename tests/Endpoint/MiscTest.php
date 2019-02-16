<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Misc;

class MiscTest extends TestCase
{
    private $_misc;
    private $_avia;
    private $_call;
    private $_mail;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_misc = new Misc($config);
        $this->_avia = array(
            'service_id' => 1
        );
        $this->_call = array(
            'phone' => '123456789',
            'start' => date('Y-m-d H:i:s')
        );
        $this->_mail = array(
            'email_to' => 'test@mail.com',
            'email_from' => 'test@mail.com',
            'subject' => 'Test subject',
            'text' => 'Some text',
            'datetime' => date('Y-m-d H:i:s')
        );
    }

    public function testCreateAvia()
    {
        $result = $this->_misc->createAvia($this->_avia);
        $this->assertInternalType('array', $result);
    }

    public function testCreateCall()
    {
        $result = $this->_misc->createCall($this->_call);
        $this->assertInternalType('array', $result);
    }

    public function testCreateMail()
    {
        $result = $this->_misc->createMail($this->_mail);
        $this->assertInternalType('array', $result);
    }

    public function testRead()
    {
        $result = $this->_misc->getCurrency();
        $this->assertInternalType('array', $result);

        $result = $this->_misc->getManagers();
        $this->assertInternalType('array', $result);
    }

}
