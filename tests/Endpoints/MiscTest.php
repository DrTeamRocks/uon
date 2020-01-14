<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Misc;

class MiscTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Misc
     */
    private $object;

    /**
     * @var array
     */
    private $avia = [
        'service_id' => 1
    ];

    /**
     * @var array
     */
    private $call = [
        'phone' => '123456789',
    ];

    /**
     * @var array
     */
    private $mail = [
        'email_to'   => 'test@mail.com',
        'email_from' => 'test@mail.com',
        'subject'    => 'Test subject',
        'text'       => 'Some text',
    ];

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Misc($config);

        // Fix datetime
        $this->call['start']    = date('Y-m-d H:i:s');
        $this->mail['datetime'] = date('Y-m-d H:i:s');
    }

    public function testCreateAvia(): void
    {
        $result = $this->object->createAvia($this->avia);
        $this->assertIsObject($result);
    }

    public function testCreateCall(): void
    {
        $result = $this->object->createCall($this->call);
        $this->assertIsObject($result);
    }

    public function testCreateMail(): void
    {
        $result = $this->object->createMail($this->mail);
        $this->assertIsObject($result);
    }

    public function testRead(): void
    {
        $result = $this->object->getCurrency();
        $this->assertIsObject($result);

        $result = $this->object->getManagers();
        $this->assertIsObject($result);
    }

}
