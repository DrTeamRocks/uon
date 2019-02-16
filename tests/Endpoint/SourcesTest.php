<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Sources;

class SourcesTest extends TestCase
{
    private $_sources;
    private $_source;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_sources = new Sources($config);
        $this->_source = array(
            'rs_name' => 'source name'
        );
    }

    public function testCreate()
    {
        $create = $this->_sources->create($this->_source);
        $this->assertInternalType('array', $create);
    }

    public function testRead()
    {
        $result = $this->_sources->all();
        $this->assertInternalType('array', $result);
    }
}
