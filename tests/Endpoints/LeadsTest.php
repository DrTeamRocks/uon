<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Leads;

class LeadsTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Leads
     */
    private $object;

    /**
     * @var array
     */
    private $_lead = [
        'note'    => 'Test lead',
        'u_email' => 'test@example.com',
        'u_phone' => '123456789'
    ];

    /**
     * @var int
     */
    public static $leadId;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Leads($config);
    }

    public function testCreate(): void
    {
        $result = $this->object->create($this->_lead);

        if (isset($result->id)) {
            self::$leadId = $result->id;
            $this->assertIsObject($result);
        }
    }

    public function testRead(): void
    {
        if (null !== self::$leadId) {
            $result = $this->object->get(self::$leadId);
            $this->assertIsObject($result);
        }
    }

    public function testReadByDate(): void
    {
        // Date for next method
        $today    = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->object->getDate($today, $tomorrow);
        $this->assertIsObject($result);
    }

}
