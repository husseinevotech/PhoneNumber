<?php

namespace App\Http\Resources\PhoneNumber;

use Illuminate\Http\Resources\Json\JsonResource;

class PhoneNumberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'country' => $this->country,
            'country_code' => $this->country_code,
            'phone_number' => $this->phone_number,
            'state' => $this->state,
        ];
    }
}
