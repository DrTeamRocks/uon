<?php
require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Misc.php');

use PHPUnit\Framework\TestCase;

class MiscTest extends TestCase
{
    private $_config;
    private $_token;
    private $_misc;
    private $avia;
    private $call;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_misc = new \UON\Misc($this->_token);

        $this->avia = array(
            'service_id' => 1
        );

        $this->call = array(
            'phone' => '123456789',
            'start' => date('Y-m-d H:i:s')
        );
    }

    public function test()
    {
        /**
         * Create
         */
        $create = $this->_misc->aviaCreate($this->avia);
        $this->assertTrue(is_array($create));

        $create = $this->_misc->callHistoryCreate($this->call);
        $this->assertTrue(is_array($create));

        /**
         * Read
         */
        $result = $this->_misc->cash();
        $this->assertTrue(is_array($result));

        $result = $this->_misc->currency();
        $this->assertTrue(is_array($result));

        $result = $this->_misc->managers();
        $this->assertTrue(is_array($result));
    }

}
