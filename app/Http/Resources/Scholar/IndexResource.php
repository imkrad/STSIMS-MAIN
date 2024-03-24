<?php

namespace App\Http\Resources\Scholar;

use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $hashids = new Hashids('krad',10);
        $id = $hashids->encode($this->id);

        return [
            'code' => $id,
            'id' => $this->id,
            'spas_id' => $this->spas_id,
            'program' => $this->program->name,
            'subprogram' => $this->subprogram->name,
            'category' => $this->category->name,
            'awarded_year' => $this->awarded_year,
            'is_endorsed' => $this->is_endorsed,
            'is_undergrad' => $this->is_undergrad,
            'is_completed' => $this->is_completed,
            'is_synced' => $this->is_synced,
            'status' => $this->status,
            'profile' => new ProfileResource($this->profile), 
            'address' => new AddressResource($this->address),
            'education' =>  new EducationResource($this->education),
            'info' => new InfoResource($this->info),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];

    }
}
