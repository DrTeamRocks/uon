<?php

require_once(__DIR__ . '/../src/Client.php');
require_once(__DIR__ . '/../src/Requests.php');

use PHPUnit\Framework\TestCase;

class RequestsTest extends TestCase
{
    private $_config;
    private $_token;
    private $_requests;
    private $request;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);

        $this->_config = include __DIR__ . "/config.php";
        $this->_token = $this->_config['token'];
        $this->_requests = new \UON\Requests($this->_token);

        // Data array of new user (or details for update)
        $this->request = array(
            'note' => 'Test request',
            'price' => '100000',
        );
    }

}
