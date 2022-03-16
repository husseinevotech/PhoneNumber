<?php

namespace Tests\Feature\PhoneNumber;

use App\Models\PhoneNumber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PhoneNumberResponseTest extends TestCase
{
    use RefreshDatabase;
    public function setUp() : void
    {
        parent::setUp();

        $this->allRoles = PhoneNumber::all();

        $this->allPhoneNumbersInFormat = $this->allRoles->map(fn($role) => $this->phoneNumberFormat($role));
    }

    public function testPhoneNumberIndexCode200WithFormat()
    {
        $response = $this->get('/api/phoneNumbers');
        $response->assertOk();
        $response->assertJson(assertPaginationFormat());
    }

    public function phoneNumberFormat($phoneNumber)
    {
        return [
            'id' => $phoneNumber->id,
            'country' => $phoneNumber->country,
            'country_code' => $phoneNumber->country_code,
            'phone_number' => $phoneNumber->phone_number,
            'state' => $phoneNumber->state,
        ];
    }
}
