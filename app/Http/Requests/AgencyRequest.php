<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgencyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'sometimes|required',
            'acronym' => 'sometimes|required',
            'code' => 'sometimes|required',
            'website' => 'sometimes|required',
            'region_code' => 'sometimes|required'
        ];
    }
}
