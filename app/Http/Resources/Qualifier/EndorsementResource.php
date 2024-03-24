<?php

namespace App\Http\Resources\Qualifier;

use Illuminate\Http\Resources\Json\JsonResource;

class EndorsementResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'is_approved' => $this->is_approved,
            'is_seened' => $this->is_seened,
            'school' => ucwords(strtolower($this->school->school->name)),
            'region' => $this->school->assigned->region,
            'name' => ucwords(strtolower($this->qualifier->profile->lastname)).', '.ucwords(strtolower($this->qualifier->profile->firstname)).' '.ucwords(strtolower($this->qualifier->profile->middlename[0])).'.',
            'course' => ucwords(strtolower($this->course->name)),
            'endorser' => $this->endorsedby,
            'user' => $this->qualifier,
            'school_id' => $this->school->id,
            'course_id' => $this->course_id
        ];
    }
}
