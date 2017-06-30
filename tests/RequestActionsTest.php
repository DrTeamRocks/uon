<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/RequestActions.php');

use PHPUnit\Framework\TestCase;

class RequestActionsTest extends TestCase
{
    private $_config;
    private $_token;
    private $_r_actions;
    private $r_action;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_r_actions = new \UON\RequestActions($this->_token);

        $this->r_action = array(
            'r_id' => '1',
            'type_id' => '1',
            'datetime' => date('Y-m-d H:i:s'),
            'text' => 'some cool text of request action'
        );
    }


    public function testCRUD()
    {
        /**
         * Create
         */
        $create = $this->_r_actions->create($this->r_action);
        error_log(print_r($create, true));
        $this->assertTrue(is_array($create));

        /**
         * Read
         */
        $result = $this->_r_actions->get($create['message']->id);
        $this->assertTrue(is_array($result));

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_r_actions->date($today, $tomorrow);
        $this->assertTrue(is_array($result));
    }
}
