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

        PhoneNumber::factory()->create();
        $this->allPhoneNumbers = PhoneNumber::all();
        $this->allPhoneNumbersInFormat = $this->allPhoneNumbers->map(fn($phoneNumber) => $this->phoneNumberFormat($phoneNumber));
    }

    public function testPhoneNumberIndexCode200WithFormat()
    {
        $response = $this->get('/api/phoneNumbers');
        $response->assertOk();
        $response->assertJson(assertPaginationFormat($this->allPhoneNumbersInFormat->toArray()));
    }

    public function testCountriesIndexCode200WithFormat()
    {
        $response = $this->get('/api/phoneNumbers/countries');
        $response->assertOk();
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
