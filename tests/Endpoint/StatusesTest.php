<?php

namespace UON\Tests;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Statuses;

class StatusesTest extends TestCase
{
    private $_statuses;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_statuses = new Statuses($config);
    }

    public function testRead()
    {
        $result = $this->_statuses->get();
        $this->assertInternalType('array', $result);

        $result = $this->_statuses->getLead();
        $this->assertInternalType('array', $result);
    }
}
