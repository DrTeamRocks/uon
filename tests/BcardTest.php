<?php namespace UON;

use PHPUnit\Framework\TestCase;

class BcardTest extends TestCase
{
    private $_file = __DIR__ . '/../extra/tmp.txt';
    private $_bcards;
    private $_bcard;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        include __DIR__ . "/../extra/config.php";

        $this->_bcards = new \UON\Bcard();
        $this->_bcard = [
            'bc_number' => '0000000001',
            'user_id' => '2'
        ];
    }

    public function testRead()
    {
        $result = $this->_bcards->getByCard($this->_bcard['bc_number']);
        $this->assertTrue(is_array($result));

        $result = $this->_bcards->getByUser($this->_bcard['user_id']);
        $this->assertTrue(is_array($result));
    }

    public function testUpdates()
    {
        $result = $this->_bcards->activate($this->_bcard);
        $this->assertTrue(is_array($result));
    }

}
