<?php

namespace App\Http\Resources\Scholar;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InfoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
        $address = json_decode($this->information);
        return [
            'account_no' => $this->account_no,
            'address' => $address->address,
            'education' => $address->education
        ];
    }
}
