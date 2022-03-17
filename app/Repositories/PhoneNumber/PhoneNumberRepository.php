<?php

namespace App\Repositories\PhoneNumber;

use App\Models\PhoneNumber;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PhoneNumberRepository
{
    public function getPhoneNumbersPaginated($pagination = 10)
    {
        return QueryBuilder::for(PhoneNumber::class)
        ->allowedFilters(["country", AllowedFilter::exact('state')])
        ->paginate($pagination);
    }

    public function getAllCounrties()
    {
        return PhoneNumber::distinct()->pluck("country")->toArray();
    }

}
