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
        $numbers = [
            [
                "country" => "Cameroon",
                "country_code" => "+237",
                "phone_number" => cleanPhoneNumberString($this->faker->regexify("(237\) ?[2368]\d{7,8}$")),
                "state" => "ok",
            ],
            [
                "country" => "Ethiopia",
                "country_code" => "+251",
                "phone_number" => cleanPhoneNumberString($this->faker->regexify("(251\) ?[1-59]\d{8}$")),
                "state" => "ok",
            ],
        ];

        return $numbers[rand(0, count($numbers)-1)];
    }
}
