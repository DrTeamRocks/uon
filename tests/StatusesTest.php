<?php
use PHPUnit\Framework\TestCase;

class StatusesTest extends TestCase
{
    private $_statuses;
    private $_status;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_statuses = new \UON\Statuses();
        $this->_status = array(
            'rs_name' => 'statuse name'
        );
    }

    public function testRead()
    {
        $result = $this->_statuses->get();
        $this->assertTrue(is_array($result));

        $result = $this->_statuses->getLead();
        $this->assertTrue(is_array($result));
    }
}
