<?php


 if(!function_exists("valid_inputs")){
    function valid_inputs($inputs){
        return substr(array_reduce($inputs, fn($a, $b) => "$a,$b"), 1);
    }
 }

 if(!function_exists("validate_single")){
    function validate_single($validator, $item, $message){
        $validator->errors()->add("$item", $message);
    }
 }
