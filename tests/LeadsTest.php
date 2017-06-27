<?php

require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Leads.php');

use PHPUnit\Framework\TestCase;

class LeadsTest extends TestCase
{
    private $_config;
    private $_token;
    private $_leads;
    private $lead;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_leads = new \UON\Leads($this->_token);

        // Data array of new user (or details for update)
        $this->lead = array(
            'note' => 'Test lead',
            'u_email' => 'test@example.com',
            'u_phone' => '123456789'
        );
    }

    public function testCURD()
    {
        /**
         * Create
         */
        $create = $this->_leads->create($this->lead);
        $this->assertTrue(is_array($create));

        /**
         * Read
         */
        $result = $this->_leads->get($create['message']->id);
        $this->assertTrue(is_array($result));

        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_leads->date($today, $tomorrow);
        $this->assertTrue(is_array($result));
    }

}
