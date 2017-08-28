<?php
use PHPUnit\Framework\TestCase;

class SourcesTest extends TestCase
{
    private $_sources;
    private $_source;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_sources = new \UON\Sources();
        $this->_source = array(
            'rs_name' => 'source name'
        );
    }

    public function testCreate()
    {
        $create = $this->_sources->create($this->_source);
        $this->assertTrue(is_array($create));
    }

    public function testRead()
    {
        $result = $this->_sources->all();
        $this->assertTrue(is_array($result));
    }
}
