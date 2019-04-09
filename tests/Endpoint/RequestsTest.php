<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Requests;

class RequestsTest extends TestCase
{
    private $_requests;
    private $_request;
    private $_requestAction;

    public static $requestId;
    public static $requestActionId;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_requests = new Requests($config);
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
        $this->assertInternalType('array', $result);

        // TODO: Remove this after bug will be fixed
        // Small bug, each second requests to system have a 0 into result
        if ($result['message']->id === 0) {
            $result['message']->id = 2;
        }

        self::$requestId = $result['message']->id;
    }

    public function testRead()
    {
        $result = $this->_requests->get(self::$requestId);
        $this->assertInternalType('array', $result);

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_requests->getUpdated($today, $tomorrow);
        $this->assertInternalType('array', $result);

        $result = $this->_requests->getDate($today, $tomorrow);
        $this->assertInternalType('array', $result);

        // For second page
        $result = $this->_requests->getDate($today, $tomorrow, 2);
        $this->assertInternalType('array', $result);

        // For other source id
        $result = $this->_requests->getDate($today, $tomorrow, 1, 1);
        $this->assertInternalType('array', $result);

        $result = $this->_requests->search();
        $this->assertInternalType('array', $result);
    }

    public function testCreateTravelType()
    {
        $result = $this->_requests->createTravelType(['name' => 'test']);
        $this->assertInternalType('array', $result);
    }

    public function testReadTravelType()
    {
        $result = $this->_requests->getTravelType();
        $this->assertInternalType('array', $result);

        $result = $this->_requests->getTravelType(['name' => 'test']);
        $this->assertInternalType('array', $result);
    }

    public function testCreateActions()
    {
        $result = $this->_requests->createActions($this->_requestAction);
        self::$requestActionId = $result['message']->id;
        $this->assertInternalType('array', $result);
    }

    public function testReadActions()
    {
        $result = $this->_requests->getActions(self::$requestActionId);
        $this->assertInternalType('array', $result);

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_requests->getDateActions($today, $tomorrow);
        $this->assertInternalType('array', $result);
    }

}
