<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PinCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'pin code' => $this->pin_code,
            'charges' => $this->charges,
        ];
    }
}
