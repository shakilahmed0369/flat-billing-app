<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlatCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'flat_name' => ['required', 'max:100'],
            'flat_bill' => ['required', 'integer'],
            'per_unit_cost' => ['required'],
            'gass_bill' => ['required', 'integer'],
            'garage_bill' => ['required', 'integer'],
            'maid_bill' => ['required', 'integer'],
            'rubbish_bill' => ['required', 'integer'],
        ];

    }
}
