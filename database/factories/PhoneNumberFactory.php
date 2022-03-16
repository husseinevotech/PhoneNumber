<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PhoneNumberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "country" => "country",
            'phone_number' => "012321312321",
            'state' => "ok",
            'country_code' => "123",
        ];
    }
}
