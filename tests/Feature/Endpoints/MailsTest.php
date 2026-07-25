<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Mails;
use Uon\Tests\TestCase;

class MailsTest extends TestCase
{
    public function test_create(): void
    {
        $result = $this->make(Mails::class)->create(['subject' => 'Hello']);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/mail/create.json');
    }
}
