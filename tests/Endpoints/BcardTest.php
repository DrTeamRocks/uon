<?php

namespace UON\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoints\Bcard;

class BcardTest extends TestCase
{
    /**
     * @var \UON\Endpoints\Bcard
     */
    private $object;

    /**
     * @var array
     */
    private $bcard;

    public function setUp(): void
    {
        $config = new Config();
        $config->set('token', getenv('API_TOKEN'));

        $this->object = new Bcard($config);
        $this->bcard  = [
            'bc_number' => '0000000001',
            'user_id'   => '2'
        ];
    }

    public function testGetByCard(): void
    {
        $result = $this->object->getByCard($this->bcard['bc_number'])->exec();
        $this->assertIsObject($result);
    }

    public function testGetByUser(): void
    {
        $result = $this->object->getByUser($this->bcard['user_id'])->exec();
        $this->assertIsObject($result);
    }

    public function testUpdates(): void
    {
        $result = $this->object->activate($this->bcard)->exec();
        $this->assertIsObject($result);
    }

}
