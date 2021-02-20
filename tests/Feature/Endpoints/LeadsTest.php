<?php

namespace Uon\Tests\Feature\Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Leads;

class LeadsTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Leads
     */
    private $leads;

    /**
     * @var array
     */
    private $newLead = [
        'note'    => 'Test lead',
        'u_email' => 'test@example.com',
        'u_phone' => '123456789',
    ];

    /**
     * @var int
     */
    public static $leadId;

    public function setUp(): void
    {
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->leads = new Leads($config);
    }

    public function test_create(): void
    {
        $result = $this->leads->create($this->newLead);

        if (isset($result->id)) {
            self::$leadId = $result->id;
            self::assertIsObject($result);
        }
    }

    public function test_get(): void
    {
        if (null !== self::$leadId) {
            $result = $this->leads->get(self::$leadId);
            self::assertIsObject($result);
        }
    }

    public function test_getDate(): void
    {
        // Date for next method
        $today    = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->leads->getDate($today, $tomorrow);
        self::assertIsObject($result);
    }

}
