<?php
use PHPUnit\Framework\TestCase;

class LeadsTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_leads;
    private $_lead;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_leads = new \UON\Leads();
        $this->_lead = [
            'note' => 'Test lead',
            'u_email' => 'test@example.com',
            'u_phone' => '123456789'
        ];
    }

    public function testCreate()
    {
        $result = $this->_leads->create($this->_lead);
        file_put_contents($this->_file, $result['message']->id);
        $this->assertTrue(is_array($result));
    }

    public function testRead()
    {
        $id = file_get_contents($this->_file);
        $result = $this->_leads->get($id);
        $this->assertTrue(is_array($result));
    }

    public function testReadByDate()
    {
        // Date for next method
        $today = date('Y-m-d');
        $tomorrow = date('Y-m-d', strtotime('tomorrow'));

        $result = $this->_leads->getDate($today, $tomorrow);
        $this->assertTrue(is_array($result));
    }

}
