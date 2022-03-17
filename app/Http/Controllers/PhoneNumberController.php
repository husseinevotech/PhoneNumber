<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhoneNumber\PhoneNumberResource;
use App\Models\PhoneNumber;
use App\Repositories\PhoneNumber\PhoneNumberRepository;
use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $phoneNumberRepository;

    public function __construct(PhoneNumberRepository $phoneNumberRepository){
        $this->phoneNumberRepository = $phoneNumberRepository;
    }

    public function index()
    {
        return ok_response(paginatedCollectionFormat(PhoneNumberResource::class, $this->phoneNumberRepository->getPhoneNumbersPaginated()));
    }

    public function getCountries()
    {
        return ok_response($this->phoneNumberRepository->getAllCounrties());
    }
}
