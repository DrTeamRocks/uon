<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Cash;

class CashTest extends TestCase
{
    private $_cash;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_cash = new Cash($config);
    }

    public function testCreate()
    {
        $result = $this->_cash->create(['name' => 'test']);
        $this->assertInternalType('array', $result);
    }

    public function testGet()
    {
        $result = $this->_cash->get();
        $this->assertInternalType('array', $result);

        $result = $this->_cash->get(['name' => 'test']);
        $this->assertInternalType('array', $result);
    }
}
