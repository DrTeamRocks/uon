<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Statuses.php');

use PHPUnit\Framework\TestCase;

class StatusesTest extends TestCase
{
    private $_config;
    private $_token;
    private $_statuses;
    private $status;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_statuses = new \UON\Statuses($this->_token);

        $this->status = array(
            'rs_name' => 'statuse name'
        );
    }

    public function testCRUD()
    {
        /**
         * Read
         */
        $result = $this->_statuses->all();
        $this->assertTrue(is_array($result));

        $result = $this->_statuses->lead();
        $this->assertTrue(is_array($result));
    }
}
