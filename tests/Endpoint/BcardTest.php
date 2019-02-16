<?php

namespace UON\Tests\Endpoint;

use PHPUnit\Framework\TestCase;
use UON\Config;
use UON\Endpoint\Bcard;

class BcardTest extends TestCase
{
    private $_bcards;
    private $_bcard;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $config = new Config();
        $config->set('token', file_get_contents(__DIR__ . '/../_token.txt'));

        $this->_bcards = new Bcard($config);
        $this->_bcard = [
            'bc_number' => '0000000001',
            'user_id' => '2'
        ];
    }

    public function testRead()
    {
        $result = $this->_bcards->getByCard($this->_bcard['bc_number']);
        $this->assertInternalType('array', $result);

        $result = $this->_bcards->getByUser($this->_bcard['user_id']);
        $this->assertInternalType('array', $result);
    }

    public function testUpdates()
    {
        $result = $this->_bcards->activate($this->_bcard);
        $this->assertInternalType('array', $result);
    }

}
