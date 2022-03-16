<?php

//validation
if(!function_exists("assertDataHasError")){
    function assertDataHasError($response, $errorText) {
        $response->assertUnprocessable();
        $response->assertJson([
            "status_code" => 422,
            "message" => "Unprocessable Entity"
        ]);
        $response->assertSee($errorText);
    }
}

if(!function_exists("assertPaginationFormat")){
    function assertPaginationFormat($data = []) {
        return [
            "status_code" => 200,
            "message" => "OK",
            "data" => [
                "data" => $data,
                "meta" => [
                    "links" => [

                    ]
                ]
            ]
        ];
    }
}

if(!function_exists("assertCreatedPaginationFormat")){
    function assertCreatedPaginationFormat($data = []) {
        return [
            "status_code" => 201,
            "message" => "Created",
            "data" => [
                "data" => $data,
                "meta" => [
                    "links" => [

                    ]
                ]
            ]
        ];
    }
}


if(!function_exists("assertDataContent")){
    function assertDataContent($data) {
        return [
            "status_code" => 200,
            "message" => "OK",
            "data" => $data
        ];
    }
}









