<?php

namespace App\Repositories\PhoneNumber;

use App\Models\PhoneNumber;


class PhoneNumberRepository
{
    public function getPhoneNumbersPaginated($pagination = 10)
    {
        return PhoneNumber::paginate($pagination);
    }

    public function getAllCounrties()
    {
        return PhoneNumber::distinct()->pluck("country")->toArray();
    }

}
