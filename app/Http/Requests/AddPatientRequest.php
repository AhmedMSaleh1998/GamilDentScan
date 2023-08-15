<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPatientRequest extends FormRequest
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
            'name'          => 'required',
            'birth_date' => 'required',
            'address'       => 'nullable',
            'phone_one'     => 'nullable',
            'phone_two'     => 'nullable',
            'email'         => 'nullable',
        ];
    }
}
