<?php

namespace Uon\Tests\Feature\Endpoints;

use Uon\Endpoints\Payments;
use Uon\Tests\TestCase;

class PaymentsTest extends TestCase
{
    private array $payment = [
        'r_id'    => 1,
        'type_id' => 1,
        'cio_id'  => 1,
    ];

    public function test_create(): void
    {
        $result = $this->make(Payments::class)->create($this->payment);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/payment/create.json');
    }

    public function test_all(): void
    {
        $result = $this->make(Payments::class)->all('2026-01-01', '2026-01-02');

        self::assertIsObject($result);
        $this->assertRequest('GET', '/payment/list/2026-01-01/2026-01-02/1.json');
    }

    public function test_all_forms(): void
    {
        $result = $this->make(Payments::class)->allForms();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/payment_form.json');
    }

    public function test_all_other_types(): void
    {
        $result = $this->make(Payments::class)->allOtherTypes();

        self::assertIsObject($result);
        $this->assertRequest('GET', '/payment_other_type.json');
    }

    public function test_get(): void
    {
        $result = $this->make(Payments::class)->get(5);

        self::assertIsObject($result);
        $this->assertRequest('GET', '/payment/5.json');
    }

    public function test_update(): void
    {
        $result = $this->make(Payments::class)->update(5, $this->payment);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/payment/update/5.json');
    }

    public function test_delete(): void
    {
        $result = $this->make(Payments::class)->delete(5);

        self::assertIsObject($result);
        $this->assertRequest('POST', '/payment/delete/5.json');
    }
}
