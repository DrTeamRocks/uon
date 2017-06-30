<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Sources.php');

use PHPUnit\Framework\TestCase;

class SourcesTest extends TestCase
{
    private $_config;
    private $_token;
    private $_sources;
    private $source;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_sources = new \UON\Sources($this->_token);

        $this->source = array(
            'rs_name' => 'source name'
        );
    }

    public function testCRUD()
    {
        /**
         * Create
         */
        $create = $this->_sources->create($this->source);
        $this->assertTrue(is_array($create));

        /**
         * Read
         */
        $result = $this->_sources->all();
        $this->assertTrue(is_array($result));
    }
}
