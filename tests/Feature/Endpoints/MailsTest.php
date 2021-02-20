<?php

namespace Endpoints;

use PHPUnit\Framework\TestCase;
use Uon\Config;
use Uon\Endpoints\Mails;

class MailsTest extends TestCase
{
    /**
     * @var \Uon\Endpoints\Mails
     */
    private $mails;

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
        $config = new Config(['token' => getenv('API_TOKEN')]);

        $this->mail['datetime'] = date('Y-m-d H:i:s');

        $this->mails = new Mails($config);
    }

    public function test_create(): void
    {
        $result = $this->mails->create($this->mail);
        self::assertIsObject($result);
    }
}