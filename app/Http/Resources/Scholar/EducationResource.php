<?php

namespace App\Http\Resources\Scholar;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'school' => ($this->school == null) ? null : new SchoolResource($this->school),
            'course' => ($this->course == null) ? null : $this->course,
            'subcourse' => $this->subcourse,
            'level' => ($this->level == null) ? 'n/a' : $this->level,
            'award' => ($this->award == null) ? 'n/a' : $this->award,
            'graduated_year' => ($this->graduated_year == null) ? 'n/a' : $this->graduated_year,
            'is_enrolled' => $this->is_enrolled,
            'is_shiftee' => $this->is_shiftee,
            'is_transferee' => $this->is_transferee,
            'is_completed' => $this->is_completed,
            'has_school' => ($this->school == null) ? false : true,
            'has_level' => ($this->level == null) ? false : true,
            'has_course' => ($this->course == null) ? false : true,
            'has_subcourse' => ($this->subcourse == null) ? false : true,
        ];
    }
}
