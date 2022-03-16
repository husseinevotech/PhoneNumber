<?php
use App\Models\StaticContent;
use App\Models\Tag;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redis;




//collection format
if(!function_exists("collectionFormat")){
    function collectionFormat($collection, $data) {
        return $collection::collection($data);
    }
}

if(!function_exists("paginatedCollectionFormat")){
    function paginatedCollectionFormat($collection, $data) {
        return $collection::collection($data)->response()->getData(true);
    }
}

 //array
 if(!function_exists("check_item_in_array_collection_contain_string")){
    function check_item_in_array_collection_contain_string($arrayCollection, $item, $string) {
        foreach ($arrayCollection as $arrayModel) {
            if(!str_contains($arrayModel[$item], $string)){
                return false;
            }
        }
        return true;
    }
 }


 //string
 if(!function_exists("cleanPhoneNumberString")){
    function cleanPhoneNumberString($phoneNumber) {
        return preg_replace('/[^0-9]/', '', $phoneNumber);
    }
}
