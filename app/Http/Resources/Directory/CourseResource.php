<?php

namespace App\Http\Resources\Directory;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'display_name' => ($this->name) ? $this->name : $this->shortcut,
            'display_shortcut' => ($this->name) ? $this->shortcut : 'Not Available',
            'display_abbreviation' => ($this->abbreviation) ? $this->abbreviation : 'Not Available',
            'display_others' => ($this->others) ? $this->others : 'Not Available',
            'name' => $this->name,
            'shortcut' => $this->shortcut,
            'abbreviation' => $this->abbreviation,
            'others' => $this->others,
            'is_active' => $this->is_active,
        ];
    }
}
