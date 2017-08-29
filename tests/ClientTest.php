<?php
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";
    }

    public function testConstruct()
    {
        try {
            new \UON\Client();
        } catch(\Exception $e) {
            $this->assertContains('Must be initialized ', $e->getMessage());
        }
    }

    public function testDoRequest()
    {
        $client = new \UON\Client();
        $result = $client->doRequest('get', '/user');
        $this->assertTrue(is_array($result));
    }

}
