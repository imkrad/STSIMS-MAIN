<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrivilegeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'type' => 'required|string',
            'short' => 'required|string',
            'regular_amount' => 'required|string',
            'summer_amount' => 'required|string',
            'is_fixed' => 'required',
            'is_reimburseable' => 'required',
        ];
    }
}
