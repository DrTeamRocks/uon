<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Leads;

class LeadsTest extends TestCase
{
    private $_leads;
    private $_lead;
    public static $leadId;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_leads = new Leads($config);
        $this->_lead = [
            'note' => 'Test lead',
            'u_email' => 'test@example.com',
            'u_phone' => '123456789'
        ];
    }

    public function testCreate()
    {
        $result = $this->_leads->create($this->_lead);

        if (isset($result['message']->id)) {
            self::$leadId = $result['message']->id;
            $this->assertInternalType('array', $result);
        }
    }

    public function testRead()
    {
        if (null !== self::$leadId) {
            $result = $this->_leads->get(self::$leadId);
            $this->assertInternalType('array', $result);
        }
    }

    public function testReadByDate()
    {
        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_leads->getDate($today, $tomorrow);
        $this->assertInternalType('array', $result);
    }

}
