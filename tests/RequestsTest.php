<?php

use PHPUnit\Framework\TestCase;

class RequestsTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_requests;
    private $_request;
    private $_requestAction;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_requests = new \UON\Requests();
        $this->_request = [
            'note' => 'Test request',
            'price' => '100000',
        ];
        $this->_requestAction = [
            'r_id' => 1,
            'text' => 'Some text',
            'datetime' => date('Y-m-d H:i:s'),
            'type_id' => 1
        ];
    }

    public function testCreate()
    {
        $result = $this->_requests->create($this->_request);
        $this->assertTrue(is_array($result));

        // TODO: Remove this after bug will be fixed
        // Small bug, each second requests to system have a 0 into result
        if ($result['message']->id == 0) $result['message']->id = 2;

        file_put_contents($this->_file, $result['message']->id);
    }

    public function testRead()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_requests->get($id);
        $this->assertTrue(is_array($result));

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_requests->getUpdated($today, $tomorrow);
        $this->assertTrue(is_array($result));

        $result = $this->_requests->getDate($today, $tomorrow);
        $this->assertTrue(is_array($result));

        $result = $this->_requests->search();
        $this->assertTrue(is_array($result));
    }

    public function testCreateActions()
    {
        $result = $this->_requests->createActions($this->_requestAction);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testReadActions()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_requests->getActions($id);
        $this->assertTrue(is_array($result));

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_requests->getDateActions($today, $tomorrow);
        $this->assertTrue(is_array($result));
    }

}
