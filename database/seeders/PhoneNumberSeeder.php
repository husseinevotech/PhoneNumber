<?php

namespace Database\Seeders;

use App\Models\PhoneNumber;

use Illuminate\Database\Seeder;


class PhoneNumberSeeder extends Seeder
{
    protected $faker;

    public function __construct(){
        $this->faker = \Faker\Factory::create();
    }

    public function run()
    {
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
            $this->createValidPhoneNumber($number);
            $this->createInValidPhoneNumber($number);
        }
    }

    public function createValidPhoneNumber($number)
    {
        $phoneNumber = new PhoneNumber();
        $phoneNumber->country = $number['country'];
        $phoneNumber->country_code = $number['country_code'];
        $phoneNumber->state = "ok";
        $phoneNumber->phone_number = cleanPhoneNumberString($this->faker->regexify($number["regex"]));
        $phoneNumber->save();
    }

    public function createInValidPhoneNumber($number)
    {
        $phoneNumber = new PhoneNumber();
        $phoneNumber->country = $number['country'];
        $phoneNumber->country_code = $number['country_code'];
        $phoneNumber->state = "nok";

        $phone_number_property = $this->createInValidPhoneNumberProperty($number["regex"]);
        $phoneNumber->phone_number = cleanPhoneNumberString($phone_number_property);

        $phoneNumber->save();
    }

    public function createInValidPhoneNumberProperty($regex)
    {
        $phone_number_property = $this->faker->phoneNumber();
        while(preg_match($regex, $phone_number_property)){
            $phone_number_property = $this->faker->phoneNumber();
        }
        return $phone_number_property;
    }
}
