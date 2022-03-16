<?php

namespace Database\Seeders;

use App\Models\PhoneNumber;

use Illuminate\Database\Seeder;


class PhoneNumberSeeder extends Seeder
{

    public function run()
    {

        $faker = \Faker\Factory::create();
        $numbers = [
            [
                "country" => "Cameroon",
                "country_code" => "+237",
                "regex" => "/\(237\) ?[2368]\d{7,8}$/",
            ],
            [
                "country" => "Ethiopia",
                "country_code" => "+251",
                "regex" => "/\(251\) ?[1-59]\d{8}$/",
            ],
            [
                "country" => "Morocco",
                "country_code" => "+212",
                "regex" => "/\(212\) ?[5-9]\d{8}$/",
            ],
            [
                "country" => "Mozambique",
                "country_code" => "+258",
                "regex" => "/\(258\) ?[28]\d{7,8}$/",
            ],
            [
                "country" => "Uganda",
                "country_code" => "+256",
                "regex" => "/\(256\) ?\d{9}$/",
            ],
        ];

        foreach ($numbers as $number) {

            $this->createValidPhoneNumber($number, $faker);
            $this->createInValidPhoneNumber($number, $faker);
        }
    }

    public function createValidPhoneNumber($number, $faker)
    {
        $phoneNumber = new PhoneNumber();
        $phoneNumber->country = $number['country'];
        $phoneNumber->country_code = $number['country_code'];
        $phoneNumber->state = "ok";
        $phoneNumber->phone_number = str_replace(" ", "",$faker->regexify($number["regex"]));
        $phoneNumber->save();
    }

    public function createInValidPhoneNumber($number, $faker)
    {
        $phoneNumber = new PhoneNumber();
        $phoneNumber->country = $number['country'];
        $phoneNumber->country_code = $number['country_code'];
        $phoneNumber->state = "nok";

        $phone_number_property = $faker->phoneNumber();
        while(preg_match($number["regex"], $phone_number_property)){
            $phone_number_property = $faker->phoneNumber();
        }
        $phoneNumber->phone_number = preg_replace( '/[^0-9]/', '', $phone_number_property );
        $phoneNumber->save();
    }
}
