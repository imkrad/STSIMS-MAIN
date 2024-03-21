<?php

namespace App\Http\Resources\Directory\School;

use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $hashids = new Hashids('krad',10);

        $alone = (!$this->is_alone) ? $this->school->combiner.' '.strtoupper($this->campus) : '';

        return [
            'id' => $hashids->encode($this->id),
            'name' => $this->school->name.' '.$alone,
            'address' => strtoupper($this->address.', '.$this->municipality->name.', '.$this->province->name.', '.$this->region->region.' '),
            'avatar' => $this->school->avatar,
            'term' => $this->term,
            'grading' => $this->grading,
            'assigned' => $this->assigned,
            'class' => ($this->school->class->name === 'SUC') ? ($this->is_main) ? $this->school->class->name.' - Main' : $this->school->class->name.' - Satellite' : $this->school->class->name

        ];
    }
}
