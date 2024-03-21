<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|max:200|unique:list_courses,name,'.$this->id,
            'shortcut' => 'sometimes|required|max:150|unique:list_courses,shortcut,'.$this->id,
            'abbreviation' => 'sometimes|required|string|max:50',
            'others' => 'sometimes|nullable|string|max:100'
        ];
    }
}
